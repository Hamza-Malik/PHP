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
			<h2 class='ti'>Paintings</h2>

			<?php  foreach ($art as $key) {
				echo "<div class ='new_art'>
				<a href='detail_art.php?b=".$key['article_id']."'><img class='at' height='400' width='400' src='data:image;base64,".$key['image']."'></a>
				<strong><p class='at'>".$key['article_title']."</p></strong>
				</div>";
			}

			?>

		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
