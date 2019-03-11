<!-- <?php session_start(); ?>  -->

<!DOCTYPE html>

<html>
<?php require 'data.php'; ?>
 <head>
   <link rel="stylesheet" href="styles.css"/>
   <title>Northampton News - Home</title>
 </head>
 <body>
   <header>
     <section>
       <h1>Northampton News</h1>
     </section>
   </header>
   <nav class="pp">
     <ul class="up">
       <?php
     require 'profile_img.php';
              ?>

     <?php require 'main_menu.php'; ?>
     <nav>
       <ul>
                        <?php require 'check_user_admin.php'; ?>
       </ul>
     </nav>
     <h2 class='ti'>Search</h2>

     <?php
for($i = 0 ; $i < count($_SESSION['search']) ; $i++) {

  $search_art=$pdo->query('SELECT * FROM csy2028.articles WHERE article_id="'.$_SESSION['search'][$i].'"');
  foreach ($search_art as $y) {
    $s_d=date('F jS Y', strtotime($y['date_time']));
   echo "<div class ='search_sec'>
   <a href='detail_art.php?b=".$y['article_id']."'><img class='s_pic' height='200' width='200' src='data:image;base64,".$y['image']."'>
  <div class='kk'> <strong><p class='pic_text'>".$y['article_title']."</p></strong><strong><p class=''>".$y['author']."</p></strong></div></a>
  </p></strong><strong><p class=''>".$s_d."</p></strong></div></a>
   </div>";
 }

}
     ?>

   </main>

   <footer>
     &copy; Northampton News 2017
   </footer>

 </body>
</html>
