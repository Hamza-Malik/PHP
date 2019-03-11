<?php
                                                       //Admin approving user comments
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['comment'] ) || isset($_POST['nest_comment'])){


  if(isset($_POST['comment'] ) && isset($_POST['nest_comment'])){
        if(isset($_POST['diss_cmnt'])){
          $rt='yes';

          foreach ($_POST['comment'] as $cmt => $al) {
         $pdo->query('UPDATE csy2028.comments SET type ="yes" WHERE comment_id = '.$al.'');

        }
        foreach ($_POST['nest_comment'] as $n_cmt => $n_al) {
        $pdo->query('UPDATE csy2028.nested_comments SET type ="yes" WHERE nested_id = '.$n_al.'');

        }
        }

 require 'app_cmnt.php';
 }
 else if(!isset($_POST['comment'] ) && isset($_POST['nest_comment'])){
       if(isset($_POST['diss_cmnt'])){
         $rt='yes';
       foreach ($_POST['nest_comment'] as $n_cmt => $n_al) {
       $pdo->query('UPDATE csy2028.nested_comments SET type ="yes" WHERE nested_id = '.$n_al.'');

       }
       }

require 'app_cmnt.php';
}

else if(isset($_POST['comment'] ) && !isset($_POST['nest_comment'])){
      if(isset($_POST['diss_cmnt'])){
        $rt='yes';

        foreach ($_POST['comment'] as $cmt => $al) {
       $pdo->query('UPDATE csy2028.comments SET type ="yes" WHERE comment_id = '.$al.'');

      }
      }

require 'app_cmnt.php';
}





}






else {
  echo "<h1>No record selected to delete</h1>";
}
 ?>
