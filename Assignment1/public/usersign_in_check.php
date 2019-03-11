<?php
session_start();
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if(isset($_POST['s_in'])){

  $stmt=$pdo->prepare('SELECT * FROM csy2028.users WHERE email= :el');
  $st=$pdo->prepare('SELECT * FROM csy2028.admins WHERE email= :el');

  $criteria = [
    'el' => $_POST['e']

  ];
  $stmt->execute($criteria);
 $user = $stmt->fetch();
  $st->execute($criteria);
  $admin = $st->fetch();

     if ($_POST['pas']==$user['password']){
      $_SESSION['id']=$user['userid'];
      $_SESSION['fir']=$user['firstname']." ".$user['surname'];
      $_SESSION['fir_name']=$user['firstname'];
      $_SESSION['pic']=$user['image'];

      require 'index.php';

      }
        else if (password_verify($_POST['pas'], $admin['password'])) {
            $_SESSION['adminid']=$admin['admin_id'];
            $_SESSION['adminname']=$admin['firstname'];
            $_SESSION['adminpic']=$admin['image'];


       require 'first_admin_page.php';

        }
else {
  require 'error.php';
}

}
 ?>
