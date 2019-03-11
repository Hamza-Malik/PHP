<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

 if(isset($_POST['edit_a'])){
$at=$_POST['hd'];


$edt=$pdo->prepare('UPDATE csy2028.articles SET article_title = :ate,
         author = :ath,
         article_text =:ctxt,
         fk_a_cat_name= :fka
        WHERE article_id =:pai');

  $chang = [
          'ath' => $_POST['au'],
          'ctxt' => $_POST['tt'],
          'fka' => $_POST['mys'],
          'pai' => $at,
          'ate' => $_POST['ti']
        ];
  $edt->execute($chang);
   require 'edit_art.php';
  }

 ?>
