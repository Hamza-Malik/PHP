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
     <h2 class='ti'>Newest To Oldest</h2>

     <?php  foreach ($lat as $key) {
       echo "<div class ='late'>
       <a href='detail_art.php?b=".$key['article_id']."'><img class='lat_img' height='400' width='400' src='data:image;base64,".$key['image']."'></a>
       <strong><p class='lat_img'>".$key['article_title']."</p></strong>
       </div>";
     }

     ?>

   </main>

   <footer>
     &copy; Northampton News 2017
   </footer>

 </body>
</html>
