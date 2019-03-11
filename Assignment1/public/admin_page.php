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

				<h2>Add Art</h2>

				<form action="add_article_record.php" method="POST" enctype="multipart/form-data">

					<label>Select Category</label><select name="myselect">
			       <?php  foreach ($p as $cat) {
				        echo " <option value ='".$cat['cat_name']."'>".$cat['cat_name']."</option>";
				      } ?>
									 </select>
									 <label>Image</label> <input type="file" name="image"/>

					<label>Title of the art</label> <input type="text" name="title"/>
					<label>Artist</label> <input type="text" name="author" />
                    <label>Price (£)</label> <input type="text" name="price" />
					<label>Description</label> <textarea name="txt" rows="8" cols="80"></textarea>
					<input type="submit" name="article_btn" value="Add Art" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
