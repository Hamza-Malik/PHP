<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['article'])){
if(isset($_POST['del_art'])){

  foreach ($_POST['article'] as $b => $val) {
 $pdo->query('DELETE FROM csy2028.articles WHERE article_id = "'.$val.'"');


}
require 'del_art.php';
 }
}

else {
  echo "<h1>No record selected to delete</h1>";
}
 ?>
