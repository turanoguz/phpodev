<?php
$serverName = "localhost";
$userName = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$serverName;dbname=php", $userName, $password);
  $pdo->exec("SET CHARSET UTF8");
  
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>