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

				<h2>Edit Admin</h2>

        <form action="edit_admin_rec.php" method="POST">

          <p>Select an Admin you want to edit :</p>

          <?php  foreach ($ad_admin as $ed_admin) {

            echo '<input type="radio" name="myradio_ad" value="'.$ed_admin['admin_id'].'" /><p class="good">'.$ed_admin['firstname'].'  '.$ed_admin['surname'].'<p>';}
            ?>

          <input type="submit" name="edit_add" value="Edit Admin" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
