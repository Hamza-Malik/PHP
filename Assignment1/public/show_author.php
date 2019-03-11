<?php
 session_start();
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$_SESSION['authoor']=$_GET['aut'];
$authorArray = [];
$j=0;
  $search_author=$pdo->prepare('SELECT * FROM csy2028.articles');
  $search_author->execute();

foreach ($search_author as $auth) {
  if (strstr($auth['author'], $_GET['aut']) ) {
  $authorArray[$j]= $auth['article_id'];
  $j++;
  }
}

$_SESSION['author_search']=$authorArray;


require 'display_author.php';

 ?>
