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
     <nav>
       <ul>
         <?php  if(isset($_SESSION['id'])){
                   echo '<h3 class="extra">Category</h3>';
                     }
                else if(isset($_SESSION['adminid'])){
                      echo '<h3 class="extra">Admin Operations</h3>';
                          }
             else{
               echo '<h3 class="extra">Category</h3>';

          }
        //	<h3 class="extra">Category</h3> -->

                       if(isset($_SESSION['id'])){
                         foreach ($p as $cate) {
                           echo "<li><a href='open_category.php?a=".$cate['cat_name']."'>".$cate['cat_name']."</a></li>";}}

                      else if((isset($_SESSION['adminid']))) {
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
     </nav>
           <?php  foreach ($art_cat as $show) {
             echo "<article class ='gg'>";
             $dd=date('F jS Y', strtotime($show['date_time']));
             echo "<h2 class='ti'>".$show['article_title']."</h2>
             <div class='mid'>
             <p class='d'>By<strong> ".$show['author']."</strong></p>
             <p class='d'>Published ".$dd."</p>
             <p class='d'>".$show['fk_a_cat_name']."</p>
             </div>
             <img height='300' width='300' src='data:image;base64,".$show['image']."'>
             <p class='at'>".$show['article_text']."</p>
             </article>";
             if(isset($_SESSION['id'])){
               echo "<div class='hamza'>
                <div class='c'><h3>Comments :</h3> </div>
              <form action='comment.php?n=".$dis['article_id']."' method='POST' class='style_cmnt'>
<label class ='lt'><strong>".$_SESSION['fir']."</strong></label><textarea class='tt' placeholder ='Add a comment....' name='yoo' rows='8' cols='70'></textarea><br>

                <input  class ='bt' type='submit' name='com' value='Comment'>
                </form>

                </div>";
             }
             else {
               echo "<p>Please login to comment</p>";
             }
           }

?>
<?php foreach ($coment as $c){

  if($c['fk_a_article_id']==$_SESSION['art']){

    echo " <div class='cm'>
<strong><p class='comment_name'>".$c['fk_u_name']."</p></strong><br>
              <p class='cmnt_txt'>".$c['comment_text']."</p>       </div>
            ";


  }
}

  ?>

   </main>

   <footer>
     &copy; Northampton News 2017
   </footer>

 </body>
</html>
