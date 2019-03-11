<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

 if(isset($_POST['edit_ad'])){

$ad_ii=$_POST['ad_id'];

      if (!empty($_POST['p_a'])) {
        $new_pass= password_hash($_POST['p_a'], PASSWORD_DEFAULT);


      }
      else if(empty($_POST['p_a'])) {
        $new_pass=$_POST['ad_pass'];
      }


$edt_a=$pdo->prepare('UPDATE csy2028.admins SET firstname = :fi_n,
         surname = :su_n,
         email =:e_ma,
         password= :p_ia
        WHERE admin_id =:a_i');

  $ad_chang = [
          'fi_n' => $_POST['f_i'],
          'su_n' => $_POST['s_i'],
          'e_ma' => $_POST['e_a'],
          'a_i' => $ad_ii,
          'p_ia' => $new_pass
        ];
  $edt_a->execute($ad_chang);
   require 'edit_admin.php';

  }

 ?>
