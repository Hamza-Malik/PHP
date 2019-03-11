<?php
session_start();
 $server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$_SESSION['art']=$_GET['b'];

$s_art=$pdo->prepare('SELECT * FROM csy2028.articles WHERE article_id=:sess_a');

$stor=[
  'sess_a' => $_SESSION['art']

];

$s_art->execute($stor);
require 'show_art.php';

 ?>
