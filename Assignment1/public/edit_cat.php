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
				<h2>Edit Category</h2>

				<form action="edit_cate_rec.php" method="POST">

          <p>Select the category you want to edit :</p>

          <?php  foreach ($c as $mm) {

            echo '<input type="radio" name="my_cat" value="'.$mm['cat_id'].'" /><p class="good">'.$mm['cat_name'].'<p>';}
            ?>

					<input type="submit" name="ed" value="Edit Category" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
