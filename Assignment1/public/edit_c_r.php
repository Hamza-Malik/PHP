<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

 if(isset($_POST['edit_c'])){
$cee=$_POST['ce'];

$edt_cate=$pdo->prepare('UPDATE csy2028.category SET cat_name = :ah,
         description = :dn
        WHERE cat_id =:cn');

  $chng = [
          'ah' => $_POST['ctn'],
          'dn' => $_POST['dc'],
          'cn' => $cee

        ];
  $edt_cate->execute($chng);
   require 'edit_cat.php';
  }

 ?>
