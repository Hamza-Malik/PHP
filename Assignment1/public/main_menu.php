<li><a href="index.php">Home</a></li>
<li><a href="latest.php">Latest Articles</a></li>
<li><a href="#">Select Category</a>

  <ul class="un">

    <?php
    require 'data.php';
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

  <img class = "icn" src="images/search.png"  height='40' width='40' onclick="mysFunction()"/>

  <form id="myDIV" action="search_news.php" method="POST">
  <input type="text" name="search" value="" class="txt_search">
  <input type="submit" name="search_btn" value="Search" class="btn_search">

  </form>
</nav>

                                  <script type="text/javascript">
                                   x = document.getElementById("myDIV");
                                  x.style.display= "none";
                                  </script>

<img src="images/banners/randombanner.php" />
<main>
                    <!-- Showing search textbox and search button -->
              <script type="text/javascript">
              function mysFunction() {
          var x = document.getElementById("myDIV");    // Reference:https://stackoverflow.com/questions/13603528/need-to-display-textarea-after-clicking-label
          if (x.style.display === "none") {
              x.style.display = "block";
          } else {
              x.style.display = "none";
          }
        }
</script>
