<?php
// Run once to create SQLite DB and tables: php -f api/init_db.php
$dbfile = __DIR__ . '/../data/app.db';
if(file_exists($dbfile)){ echo "DB exists at $dbfile\n"; exit; }
$db = new PDO('sqlite:' . $dbfile);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec('CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email TEXT UNIQUE NOT NULL,
  password TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);');
$db->exec('CREATE TABLE lists (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  title TEXT NOT NULL,
  items TEXT DEFAULT "[]",
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(user_id) REFERENCES users(id)
);');
echo "Database initialized at $dbfile\n";
