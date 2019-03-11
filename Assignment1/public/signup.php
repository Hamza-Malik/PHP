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
        <h2><strong>Sign Up</strong></h2>

				<form  action="sign_up_record.php" method="POST" enctype="multipart/form-data">
					<label>Select Profile image</label> <input type="file" name="image"/>
				  <label>First name :</label> <input type="text" name="u_name"/>
				  <label>Last name :</label> <input type="text"  name="s_name"/>
          <label>Email :</label> <input type="email"  name="ema"/>
          <label>Password :</label> <input type="password"  name="pass"/>
					<input type="checkbox" name="update" class="update_noti"><p class="noti">Would you like yo receive updates when new article poted</p>

				  <input type="submit" name="sup" value="Sign Up" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
