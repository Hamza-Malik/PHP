
<?php
                                                       // Add Admin databse
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if(isset($_POST['add_admin_btn'])){
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
  $image=addslashes($_FILES['image']['tmp_name']);
  $image=file_get_contents($image);  //Reference : https://www.youtube.com/watch?v=4ZpqQ3j1o2w
  $image=base64_encode($image);     //convert image into base64
  $hash = password_hash($_POST['a_pass'], PASSWORD_DEFAULT);   //implementing password hashing

$admin_stmt=$pdo->prepare('INSERT INTO csy2028.artist(artist_firstname, artist_lastname, profile_pic) VALUES(:first,:name,:imm)  ');
$criteria = [
  'first' => $_POST['a_name'],
  'name' => $_POST['a_s_name'],
  'imm'=>$image
];

$admin_stmt->execute($criteria);

require 'add_admin.php';
  }
  else{
  $dd=$pdo->query('SELECT * FROM csy2028.noimage WHERE idnoimage="1" ');   //Store this image if no image is selected for admin's profile pic
 // $hash = password_hash($_POST['a_pass'], PASSWORD_DEFAULT);

foreach ($dd as $qq) {
$image=$qq['image'];
}

  $admin_stmt=$pdo->prepare('INSERT INTO csy2028.admins(artist_firstname, artist_lastname, profile_pic) VALUES(:first,:name,:imm)  ');
  $criteria = [
    'first' => $_POST['a_name'],
    'name' => $_POST['a_s_name'],
    'imm'=>$image
  ];

  $admin_stmt->execute($criteria);
  require 'add_admin.php';
  }

}

 ?>
