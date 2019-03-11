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
     <h2 class='ti'>Articles By " <?php echo $_SESSION['authoor'];?> "</h2>

     <?php
for($j = 0 ; $j < count($_SESSION['author_search']) ; $j++) {

  $search_at=$pdo->query('SELECT * FROM csy2028.articles WHERE article_id="'.$_SESSION['author_search'][$j].'"');
  foreach ($search_at as $author) {
    $at_d=date('F jS Y', strtotime($author['date_time']));
   echo "<div class ='search_sec'>
   <a href='detail_art.php?b=".$author['article_id']."'><img class='s_pic' height='200' width='200' src='data:image;base64,".$author['image']."'>
  <div class='kk'> <strong><p class='pic_text'>".$author['article_title']."</p></strong><strong><p class=''>".$author['author']."</p></strong></div></a>
  </p></strong><strong><p class=''>".$at_d."</p></strong></div></a>
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
