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

				<h2>Welcome Admin</h2>

				<form >
      <h3>You are Logged In as Admin</h3>

				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
