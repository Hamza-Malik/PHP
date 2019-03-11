
<?php
session_start();
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['sup'])){
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
  $image=addslashes($_FILES['image']['tmp_name']);
  $image=file_get_contents($image);
  $image=base64_encode($image);
  $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$stmt=$pdo->prepare('INSERT INTO csy2028.users(firstname, surname, email,password,image) VALUES(:first,:name,:em,:pa,:imm)  ');
$check=$pdo->prepare('SELECT * FROM csy2028.users WHERE email= :em');
$criteria = [
  'first' => $_POST['u_name'],
  'name' => $_POST['s_name'],
  'em' => $_POST['ema'],
  'pa' => $hash,
  'imm'=>$image
];
$goo = [
  'em' => $_POST['ema']
];
$stmt->execute($criteria);

$check->execute($goo);

$usr= $check->fetch();
if (password_verify($_POST['pass'], $usr['password'])) {
$_SESSION['id']=$usr['userid'];
$_SESSION['fir']=$usr['firstname']." ".$usr['surname'];
$_SESSION['pic']=$usr['image'];
$_SESSION['fir_name']=$usr['firstname'];
}
require 'index.php';
  }
  else{
  $dd=$pdo->query('SELECT * FROM csy2028.noimage WHERE idnoimage="1" ');
  $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

foreach ($dd as $qq) {
$image=$qq['image'];
}

  $stmt=$pdo->prepare('INSERT INTO csy2028.users(firstname, surname, email,password,image) VALUES(:first,:name,:em,:pa,:imm)  ');
  $check=$pdo->prepare('SELECT * FROM csy2028.users WHERE email= :em');

  $criteria = [
    'first' => $_POST['u_name'],
    'name' => $_POST['s_name'],
    'em' => $_POST['ema'],
    'pa' => $hash,
    'imm'=>$image
  ];
  $goo = [
    'em' => $_POST['ema']
    //'pa' => $_POST['pass']
  ];
  $stmt->execute($criteria);
  $check->execute($goo);
  $usr= $check->fetch();
  if (password_verify($_POST['pass'], $usr['password'])) {
  $_SESSION['id']=$usr['userid'];
  $_SESSION['fir']=$usr['firstname']." ".$usr['surname'];
  $_SESSION['pic']=$usr['image'];
  $_SESSION['fir_name']=$user['firstname'];
}

  require 'index.php';
  }

}

 ?>
