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
				<h2>Delete Category</h2>

				<form action="de_cat_record.php" method="POST">

				 <p>Select the categories you want to delete?</p>
				 <?php
				 foreach ($p as $cat) {
				 echo " <input type='checkbox' name='category[]' value ='".$cat['cat_name']."'/> <p class='good'>".$cat['cat_name']."</p><br>";
			 }
						?>
						<p class="error">Deleting category will also delete articles in that category.</p>

				 <input type="submit" name="del_btn" value="Delete Category" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
