<?php
                                                         //Storing comments into databse
session_start();
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['com'])){
$tp='no';                            //Initial type of comments in "no"
$cmnt_date=date('Y/m/d');

$cmnt=$pdo->prepare('INSERT INTO csy2028.comments(fk_u_name, fk_a_article_id, comment_text,fk_a_cat_name,type,user_pic,comment_date,fk_a_user_id)
VALUES(:us_name,:a_id,:cm,:cn,:te,:i_user,:d_cmnt,:a_user_id)  ');


$ria = [
  'us_name' => $_SESSION['fir'],
  'a_id' => $_GET['n'],
  'cm' => $_POST['yoo'],
  'cn' => $_POST['field'],
  'te'=>$tp,
  'i_user'=>$_POST['pic'],
  'd_cmnt'=>$cmnt_date,
  'a_user_id' => $_SESSION['id']


];
$cmnt->execute($ria);
require 'show_art.php';
}


 ?>
