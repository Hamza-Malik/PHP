<?php
session_start();
 $server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$_SESSION['cat_name']=$_GET['a'];
$art_cat=$pdo->prepare('SELECT * FROM csy2028.articles WHERE fk_a_cat_name="'.$_SESSION['cat_name'].'"');
$art_cat->execute();
require 'cat_art.php';

 ?>
