<?php

$serverName = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'chobo';

try {
  $dsn = "mysql:host={$serverName};dbname={$dbName}";
  $db = new PDO($dsn, $dbUser, $dbPassword);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // echo "DB 연결 성공";
} catch (PDOException $e) {
  echo $e->getMessage();
}
