
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

           <?php
           $no=0;
           $no_comments=$pdo->query('SELECT * FROM csy2028.comments WHERE fk_a_article_id= "'.$_SESSION['art'].'"');
           $no_comments_nest=$pdo->query('SELECT * FROM csy2028.nested_comments WHERE fk_a_art_id= "'.$_SESSION['art'].'"');

           foreach ($no_comments as $number) {
             if($number['type']=='yes'){
               $no=$no+1;
             }
}
foreach ($no_comments_nest as $number_nest) {
  if($number_nest['type']=='yes'){
    $no=$no+1;
  }
}

            foreach ($s_art as $dis) {
             echo "<article class ='gg'>";
             $aa=date('F jS Y', strtotime($dis['date_time']));
             echo "<h2 class='ti'>".$dis['article_title']."</h2>
             <div class='mid'>
             <a href='show_author.php?aut=".$dis['author']."' class='d'>By<strong> ".$dis['author']."</strong></a>
             <p class='d'>Published ".$aa."</p>
             <p class='d'>".$dis['fk_a_cat_name']."</p>
             </div>

             <div class=im>

            <a href='https://www.facebook.com/share'> <img height='60' width='60'src='images/fr.png' class='one' ></a>
            <a href='https://twitter.com/share'> <img height='64' width='64'src='images/tw.png' class='three' ></a>

            <a href='https://accounts.google.com/signin/v2/sl/pwd?flowName=GlifWebSignIn&flowEntry=ServiceLogi'> <img height='60' width='60'src='images/gr.jpg' class='two' ></a>

             </div>
          <div class='comment_right'>   <img height='40' width='40'src='images/cmnt.png' class='' ><strong><p>".$no."</p></strong></div>
             <img height='500' width='900' src='data:image;base64,".$dis['image']."'>
             <div class='para'><p class='at'>".$dis['article_text']."</p></div>
             <form action='cart.php?art_id=".$dis['article_id']."' method='POST' class='style_cmnt'>
             <input  class ='bt' type='submit' name='com' value='Buy''>
             </form>
             </article>";
             if(isset($_SESSION['id'])){
               echo "<div class='hamza'>
                <div class='c'><h3>Comments :</h3> </div>
              <form action='comment.php?n=".$dis['article_id']."' method='POST' class='style_cmnt'>
<label class ='lt'><strong>".$_SESSION['fir']."</strong></label><textarea class='tt' placeholder ='Add a comment....' name='yoo' rows='8' cols='70'></textarea><br>

                <input  class ='bt' type='submit' name='com' value='Comment'  onclick='myFunction()'>
                <input type='hidden' name='field' value='" .$dis['fk_a_cat_name']."'/>
                <input type='hidden' name='pic' value='" .$_SESSION['pic']."'/>

                </form>

                </div>";
             }
            else if(isset($_SESSION['adminid'])){

              echo "<h3 class ='s_l_in'>Log In as an User to Comment ? <a href='signin.php'> Click Here</a></h3>";


            }
             else {
               echo "<h3 class ='s_l_in'>Log In to Comment Or Reply ? <a href='signin.php'> Click Here</a></h3>";
             }
           }

?>
<script>
function myFunction() {

    var o=  window.open("", "MsgWindow", "resizable=yes,top=200,left=500,width=400,height=200");
      o.document.write("<h3>You comment has been sent to admin team for approval.. Thanks!!!</h3>");
  }
</script>

  <?php
if(isset($_SESSION['id'])){
   foreach ($coment as $c){
    if($c['fk_a_article_id']==$_SESSION['art'] && $c['type']=='yes'){
      echo "<div class='merg'> <img height='70' width='70' class='sze' src='data:image;base64,".$c['user_pic']."'><div class='cm'>
<strong><p class='fff'>".$c['fk_u_name']."</p></strong><br>
                <p class= 'fff'>".$c['comment_text']."</p>
                <a href='nested_cmnt.php?cmnt_id=".$c['comment_id']."' class ='rply' >Reply</a> </div> </div>
                ";

                foreach ($nest_coment as $n_c){
                  if($n_c['fk_a_art_id']==$_SESSION['art'] && $n_c['type']=='yes' && $n_c['fk_ac_comment_id']==$c['comment_id']){

            echo "<div class='n_merg'> <img height='50' width='50' class='n_sze' src='data:image;base64,".$n_c['image']."'><div class='n_cm'>
            <strong><p class='n_fff'>".$n_c['fk_cur_user_name']."</p></strong><br>
                    <p class= 'n_fff'>".$n_c['nested_comment']."</p></div> </div>";

                  }
            }
            $nest_coment=$pdo->query('SELECT * FROM csy2028.nested_comments');

    }


  }

}

else{
   foreach ($coment as $c){
    if($c['fk_a_article_id']==$_SESSION['art'] && $c['type']=='yes'){
// $_SESSION['dd']=$c['comment_id'];
      echo "<div class='merg'> <img height='70' width='70' class='sze' src='data:image;base64,".$c['user_pic']."'><div class='cm'>
<strong><p class='fff'>".$c['fk_u_name']."</p></strong><br>
                <p class= 'fff'>".$c['comment_text']."</p> </div> </div>";

                foreach ($nest_coment as $n_c){
                  if($n_c['fk_a_art_id']==$_SESSION['art'] && $n_c['type']=='yes' && $n_c['fk_ac_comment_id']==$c['comment_id']){

            echo "<div class='n_merg'> <img height='50' width='50' class='n_sze' src='data:image;base64,".$n_c['image']."'><div class='n_cm'>
            <strong><p class='n_fff'>".$n_c['fk_cur_user_name']."</p></strong><br>
                    <p class= 'n_fff'>".$n_c['nested_comment']."</p></div> </div>";

                  }
            }
            $nest_coment=$pdo->query('SELECT * FROM csy2028.nested_comments');

    }


  }

}


    ?>

   </main>

   <footer>
     &copy; Northampton News 2017
   </footer>

 </body>
</html>
