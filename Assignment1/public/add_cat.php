<?php session_start(); ?>
<!DOCTYPE html>
                                                     <!-- Add category HTML page -->
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
				<h2>Add Category</h2>

				<form action="add_cat_record.php" method="POST">
					<label>Enter name of the Category</label> <input type="text" name="catname"/>
          <label>Description about the Category</label> <textarea name="desc" rows="15" cols="100"></textarea>
					<input type="submit" name="cate" value="Add Category" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
