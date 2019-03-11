<?php
 session_start();
$server='v.je';
$username='student';
$password='student';
$schema='csy2028';
$pdo= new PDO('mysql:dbname'.$schema.';host='.$server,$username,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if (isset($_POST['search_btn'])) {
$searchArray = [];
$i=0;
  $search_art=$pdo->prepare('SELECT * FROM csy2028.articles');
  $search_art->execute();

foreach ($search_art as $store) {  //Search from artilces table in database
  if (strstr($store['author'], $_POST['search']) || strstr($store['article_title'], $_POST['search']) || strstr($store['article_text'], $_POST['search']) || strstr($store['fk_a_cat_name'], $_POST['search']) ) {
  $searchArray[$i]= $store['article_id'];
  $i++;                          //Reference : https://stackoverflow.com/questions/3950622/how-to-search-text-using-php-if-text-contains-world
  }
}

$_SESSION['search']=$searchArray;

}
require 'search_page.php';

 ?>
