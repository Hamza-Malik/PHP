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
     <ul>
       <li><a href="index.php">Home</a></li>
       <li><a href="latest.php">Latest Articles</a></li>
       <li><a href="#">Select Category</a>

         <ul>

           <?php
                              foreach ($s as $cate) {
                               echo "<li><a href='open_category.php?a=".$cate['cat_name']."'>".$cate['cat_name']."</a></li>";
                                 }
                     ?>
         </ul>
       </li>
       <li><a href="contact.php">Contact us</a></li>
    <?php  if(isset($_SESSION['id'])){
              echo '<li><a href="logout.php">Log Out</a></li>';
                }
           else if(isset($_SESSION['adminid'])){
                 echo '<li><a href="logout.php">Admin Log Out</a></li>';
                     }
        else{
       echo '<li><a href="signin.php">Sign In</a></li>';
     }?>

     </ul>
   </nav>
   <img src="images/banners/randombanner.php" />
   <main>
     <!-- <nav>
       <ul>
          <?php  //if(isset($_SESSION['id'])){
                  // echo '<h3 class="extra">Category</h3>';
                    // }
                 if(isset($_SESSION['adminid'])){
                      echo '<h3 class="extra">Admin Operations</h3>';
                          }
          //    else{
          //      echo '<h3 class="extra">Category</h3>';
          //
          // }
        //	<h3 class="extra">Category</h3> -->

                       // if(isset($_SESSION['id'])){
                       //   foreach ($p as $cate) {
                       //     echo "<li><a href='open_category.php?a=".$cate['cat_name']."'>".$cate['cat_name']."</a></li>";}}

                       if((isset($_SESSION['adminid']))) {
                      echo ' <li><a href="admin_page.php">Add Articles</a></li>
                      <li><a href="edit_art.php">Edit Articles</a></li>
                      <li><a href="del_art.php">Delete Articles</a></li>
                      <li><a href="add_cat.php">Add Category</a></li>
                      <li><a href="edit_cat.php">Edit Category</a></li>
                      <li><a href="del_cat.php">Delete Category</a></li>';
                      }

                      else {
                        foreach ($p as $cate) {
                          echo "<li><a href='open_category.php?a=".$cate['cat_name']."'>".$cate['cat_name']."</a></li>";}}

                        ?>
       </ul>
     </nav> -->
     <h2 class='ti'>Article</h2>

     <?php  foreach ($art as $key) {
       echo "<div class ='new_art'>
       <a href='detail_art.php?b=".$key['article_id']."'><img class='at' height='400' width='400' src='data:image;base64,".$key['image']."'></a>
       <strong><p class='at'>".$key['article_title']."</p></strong>
       </div>";
     }

     ?>

   </main>

   <footer>
     &copy; Northampton News 2017
   </footer>

 </body>
</html>
