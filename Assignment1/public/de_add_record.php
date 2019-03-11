<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['admin'])){
if(isset($_POST['del_admin'])){

  foreach ($_POST['admin'] as $aa => $dpp) {
 $pdo->query('DELETE FROM csy2028.admins WHERE admin_id = "'.$dpp.'"');


}
require 'delete_admin.php';
 }
}

else {
  echo "<h1>No record selected to delete</h1>";
}
 ?>
