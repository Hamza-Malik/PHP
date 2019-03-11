<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['category'])){
if(isset($_POST['del_btn'])){

  foreach ($_POST['category'] as $key => $value) {
 $pdo->query('DELETE FROM csy2028.category WHERE cat_name ="'.$value.'"');
 $pdo->query('DELETE FROM csy2028.articles WHERE fk_a_cat_name ="'.$value.'"');


}

require 'del_cat.php';
 }
}

else {
  echo "<h1>No record selected to delete</h1>";
}
 ?>
