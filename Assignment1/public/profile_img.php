<?php

if(isset($_SESSION['id'])){
         echo '<img class="pr_img" height="50" width="50" src="data:image;base64,'.$_SESSION['pic'].'"><li>
        <h3> <a href="#">'.$_SESSION['fir_name'].'</a></h3></li>';
       }
    else if(isset($_SESSION['adminname'])){
                 echo '<img class="pr_img" height="50" width="50" src="data:image;base64,'.$_SESSION['adminpic'].'">
               <li>
              <h3>  <a href="#">'.$_SESSION['adminname'].'</a></h3></li>';
              }
              else {
                echo ' <li>
                  <a href="#"></a></li>';
                  }


       ?>
