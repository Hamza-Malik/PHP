<?php
                                             //Add Category database
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['cate'])){

$cat=$pdo->prepare('INSERT INTO csy2028.category(cat_name,description) VALUES(:n,:des) ');

$cri = [
  'n' => $_POST['catname'],
  'des' => $_POST['desc']
];
$cat->execute($cri);
require 'add_cat.php';
}
 ?>
