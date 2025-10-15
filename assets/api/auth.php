<?php
session_start();
header('Content-Type: application/json');
$action = $_GET['action'] ?? '';
$pdo = new PDO('sqlite:' . __DIR__ . '/../data/app.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function json($data, $code=200){ http_response_code($code); echo json_encode($data); exit; }

if($action === 'register'){
  $in = json_decode(file_get_contents('php://input'), true);
  if(!filter_var($in['email'] ?? '', FILTER_VALIDATE_EMAIL)) json(['message'=>'Invalid email'],400);
  if(strlen($in['password'] ?? '') < 6) json(['message'=>'Password too short'],400);
  $hash = password_hash($in['password'], PASSWORD_DEFAULT);
  $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (?,?)');
  try{
    $stmt->execute([$in['email'],$hash]);
    $_SESSION['user_id'] = $pdo->lastInsertId();
    json(['message'=>'Registered','user'=>['id'=>$_SESSION['user_id'],'email'=>$in['email']]]);
  }catch(Exception $e){
    json(['message'=>'User exists or error: '.$e->getMessage()],400);
  }
}elseif($action === 'login'){
  $in = json_decode(file_get_contents('php://input'), true);
  $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
  $stmt->execute([$in['email']]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!$user || !password_verify($in['password'],$user['password'])) json(['message'=>'Invalid credentials'],401);
  $_SESSION['user_id'] = $user['id'];
  json(['message'=>'Logged in','user'=>['id'=>$user['id'],'email'=>$user['email']]]);
}elseif($action === 'logout'){
  session_destroy();
  json(['message'=>'Logged out']);
}elseif($action === 'check'){
  if(!empty($_SESSION['user_id'])){
    $stmt = $pdo->prepare('SELECT id,email FROM users WHERE id=?');
    $stmt->execute([$_SESSION['user_id']]);
    $u = $stmt->fetch(PDO::FETCH_ASSOC);
    json(['user'=>$u]);
  }else json(['user'=>null]);
}else{
  json(['message'=>'Unknown action'],400);
}
