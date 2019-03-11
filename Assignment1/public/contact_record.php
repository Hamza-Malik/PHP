
<?php
                                                           // Contact us database
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['send'])){
  $mes_date = date('Y/m/d');

$msg=$pdo->prepare('INSERT INTO csy2028.contactus(firstname, lastname, email,message,date_mes) VALUES(:fst,:lna,:ce,:mge,:d)  ');

$deliver = [
  'fst' => $_POST['c_f_n'],
  'lna' => $_POST['c_l_n'],
  'ce' => $_POST['c_e'],
  'mge' => $_POST['mssge'],
    'd'  =>$mes_date
];
$msg->execute($deliver);
require 'contact.php';
}

 ?>
