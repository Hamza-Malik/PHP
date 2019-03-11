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

			<article>
				<h2 class="ti"><strong>Sign In</strong></h2>

				<form  action="usersign_in_check.php" method="POST">
				  <label>E-mail :</label> <input type="text" name="e"/>
				  <label>Password :</label> <input type="password"  name="pas"/>
				  <input type="submit" name="s_in" value="Sign In" />
					<p class="ho">Don't have an account? <a href="signup.php"> Sign up</a></p>

				</form>

			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
