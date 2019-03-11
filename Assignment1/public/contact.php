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
												 <?php require 'check_user_admin.php'; ?>
				</ul>
			</nav>

        <h2 class="ti"><strong>Contact Us</strong></h2>

				<form  action="contact_record.php" method="POST">
				  <label>First name :</label> <input type="text" name="c_f_n"/>
				  <label>Last name :</label> <input type="text"  name="c_l_n"/>
          <label>Email :</label> <input type="email"  name="c_e"/>
          <label>Message :</label> <textarea name="mssge" rows="8" cols="80"></textarea>

				  <input type="submit" name="send" value="Send Message" />
				</form>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
