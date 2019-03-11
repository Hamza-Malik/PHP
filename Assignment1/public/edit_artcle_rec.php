<?php session_start(); ?>
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
				<?php require 'admin_op.php'; ?>

				</ul>
			</nav>

			<article>

				<h2>Edit Articles</h2>

				<form action="edit_a_r.php" method="POST">

          <?php $i= $pdo->query('SELECT * FROM csy2028.articles WHERE article_id = "'.$_POST ['myradio'].'"');
          foreach ($i as $v){
           ?>
          <p>Enter what you want to edit :</p>

          <label>Select New Category</label><select name="mys">
             <?php  foreach ($p as $cat) {
                  if($v['fk_a_cat_name']===$cat['cat_name']){
                    echo " <option  selected='selected' value ='".$cat['cat_name']."'>".$cat['cat_name']."</option>";
                  }

                    else{
               echo " <option value ='".$cat['cat_name']."'>".$cat['cat_name']."</option>";}
              } ?>
            </select>

            <label>New Title of the article</label> <input type="text" value="<?php echo $v['article_title'];?>" name="ti" />
            <label>New Author of the article</label> <input type="text" value="<?php echo $v['author']; ?>" name="au"/>
            <label>New Text on the article</label> <textarea name="tt"><?php echo $v['article_text']; ?></textarea>

             <input type="hidden" name="hd" value="<?php echo $v['article_id'];}?>">
					<input type="submit" name="edit_a" value="Edit Article" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
