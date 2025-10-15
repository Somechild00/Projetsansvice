<?php
session_start();
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
$pdo = new PDO('sqlite:' . __DIR__ . '/../data/app.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
function json($data,$code=200){ http_response_code($code); echo json_encode($data); exit; }
if(empty($_SESSION['user_id'])) json(['message'=>'Unauthorized'],401);
$uid = $_SESSION['user_id'];

if($method === 'GET'){
  $stmt = $pdo->prepare('SELECT id,title,items FROM lists WHERE user_id = ? ORDER BY created_at DESC');
  $stmt->execute([$uid]);
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($rows as &$r) $r['items'] = json_decode($r['items'] ?? '[]', true);
  json(['lists'=>$rows]);
}

$input = json_decode(file_get_contents('php://input'), true);
if($method === 'POST'){
  $title = trim($input['title'] ?? '');
  if($title === '') json(['message'=>'Title required'],400);
  $stmt = $pdo->prepare('INSERT INTO lists (user_id,title,items) VALUES (?,?,?)');
  $stmt->execute([$uid,$title,json_encode([])]);
  json(['message'=>'Created','id'=>$pdo->lastInsertId()]);
}

if($method === 'PUT'){
  if(empty($input['id'])) json(['message'=>'id required'],400);
  $id = (int)$input['id'];
  $stmt = $pdo->prepare('SELECT items FROM lists WHERE id=? AND user_id=?');
  $stmt->execute([$id,$uid]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!$row) json(['message'=>'Not found'],404);
  $items = json_decode($row['items'] ?? '[]', true);
  if($input['action'] === 'add'){
    $items[] = $input['item'] ?? '';
  }elseif($input['action'] === 'remove'){
    $idx = (int)$input['index'];
    if(isset($items[$idx])) array_splice($items,$idx,1);
  }
  $stmt = $pdo->prepare('UPDATE lists SET items = ? WHERE id=? AND user_id=?');
  $stmt->execute([json_encode($items),$id,$uid]);
  json(['message'=>'Updated']);
}

if($method === 'DELETE'){
  if(empty($input['id'])) json(['message'=>'id required'],400);
  $id = (int)$input['id'];
  $stmt = $pdo->prepare('DELETE FROM lists WHERE id=? AND user_id=?');
  $stmt->execute([$id,$uid]);
  json(['message'=>'Deleted']);
}

json(['message'=>'Unsupported method'],405);
