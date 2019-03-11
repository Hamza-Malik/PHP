<?php

$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

 if(isset($_POST['article_btn'])){
   if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
$date = date('Y/m/d');
$image=addslashes($_FILES['image']['tmp_name']);
$image=file_get_contents($image);  //Reference: https://www.youtube.com/watch?v=4ZpqQ3j1o2w
$image=base64_encode($image); //Convert image into base64

       $article=$pdo->prepare('INSERT INTO csy2028.articles(article_title,article_text, author,fk_a_cat_name,date_time,image,price) VALUES(:title,:txt,:author,:catname,:da,:im,:pri)  ');

   $crite = [
     'title' => $_POST['title'],
     'author' => $_POST['author'],
     'txt' => $_POST['txt'],
     'catname'=>$_POST['myselect'],
       'pri'=>$_POST['price'],
     'da' => $date,
     'im'=>$image
   ];
   $article->execute($crite);

   require 'index.php';
  }
  else{
    $no_im=$pdo->query('SELECT * FROM csy2028.noimage WHERE idnoimage="2" ');
  foreach ($no_im as $a_im) {
  $image=$a_im['image'];
  }
  $date = date('Y/m/d');


  $article=$pdo->prepare('INSERT INTO csy2028.articles(article_title,article_text, author,fk_a_cat_name,date_time,image,price) VALUES(:title,:txt,:author,:catname,:da,:im,:pri)  ');

     $crite = [
       'title' => $_POST['title'],
       'author' => $_POST['author'],
       'txt' => $_POST['txt'],
       'catname'=>$_POST['myselect'],
         'pri'=>$_POST['price'],
       'da' => $date,
       'im'=>$image
     ];
     $article->execute($crite);

     require 'index.php';

  }
}
?>
