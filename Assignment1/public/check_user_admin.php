<?php
                                          //Checking whether user or admin is logged in
 require 'data.php';

 if(isset($_SESSION['id'])){
          echo '<h3 class="extra">Category</h3>';
            }

    else if(!isset($_SESSION['adminid'])){
      echo '<h3 class="extra">Category</h3>';

 }

              if(isset($_SESSION['id'])){
                foreach ($p as $cate) {
                  echo "<li><a href='open_category.php?a=".$cate['cat_name']."'>".$cate['cat_name']."</a></li>";}}

             else if((isset($_SESSION['adminid']))) {
             echo ' <h3 class="extra">Article Operations</h3>
             <li><a href="admin_page.php">Add Articles</a></li>
             <li><a href="edit_art.php">Edit Articles</a></li>
             <li><a href="del_art.php">Delete Articles</a></li>
             <h3 class="extra">Category Operations</h3>
             <li><a href="add_cat.php">Add Category</a></li>
             <li><a href="edit_cat.php">Edit Category</a></li>
             <li><a href="del_cat.php">Delete Category</a></li>
             <li><a href="app_cmnt.php">Approve Comments</a></li>
             <li><a href="contact_rec.php">Viewers Messages</a></li>
             <h3 class="extra">Admin Operations</h3>
             <li><a href="add_admin.php">Add Admin</a></li>
              <li><a href="edit_admin.php">Edit Admin</a></li>
               <li><a href="delete_admin.php">Delete Admin</a></li>';
           }

             else {
               foreach ($p as $cate) {
                 echo "<li><a href='open_category.php?a=".$cate['cat_name']."'>".$cate['cat_name']."</a></li>";}}

               ?>
