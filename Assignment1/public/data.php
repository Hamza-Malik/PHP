<?php
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$s=$pdo->prepare('SELECT * FROM csy2028.category ');
$s->execute();

$p=$pdo->prepare('SELECT * FROM csy2028.category ');
$p->execute();

$ad_admin=$pdo->prepare('SELECT * FROM csy2028.admins ');
$ad_admin->execute();

$c=$pdo->prepare('SELECT * FROM csy2028.category ');
$c->execute();
$l=$pdo->prepare('SELECT * FROM csy2028.category ');
$l->execute();

$coment=$pdo->prepare('SELECT * FROM csy2028.comments');
$coment->execute();

$nest_coment=$pdo->query('SELECT * FROM csy2028.nested_comments');

$view_message=$pdo->prepare('SELECT * FROM csy2028.contactus');
$view_message->execute();

$art=$pdo->prepare('SELECT * FROM csy2028.articles ');
$art->execute();
$lat=$pdo->prepare('SELECT * FROM csy2028.articles order by date_time DESC');  //Setting articles in descending order
$lat->execute();

if(isset($_SESSION['art'])){
$s_art=$pdo->prepare('SELECT * FROM csy2028.articles WHERE article_id='.$_SESSION['art'].'');
$s_art->execute();
}

if(isset($_SESSION['cat_name'])){
$art_cat=$pdo->prepare('SELECT * FROM csy2028.articles WHERE fk_a_cat_name="'.$_SESSION['cat_name'].'"');
$art_cat->execute();

}


 ?>
