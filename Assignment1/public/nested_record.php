<?php
session_start();
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['nest'])){
$type='no';
  
$st_nest=$pdo->prepare('INSERT INTO csy2028.nested_comments(fk_pre_user_id, fk_cur_user_id, fk_a_art_id,nested_comment,fk_ac_comment_id,image,fk_cur_user_name,type)
VALUES(:pre_user,:cur_user,:art_id,:nested,:top_cmnt,:nest_im,:nest_cur_user,:tp)  ');
$criteria = [
  'pre_user' => $_GET['pre_use'],
  'cur_user' => $_SESSION['id'],
  'art_id' => $_SESSION['art'],
  'nested' => $_POST['ne_cmnt'],
  'top_cmnt'=>$_GET['top'],
  'nest_im'=> $_SESSION['pic'],
  'nest_cur_user'=> $_SESSION['fir'],
  'tp'=>$type


];

$st_nest->execute($criteria);

require 'show_art.php';
}
?>
