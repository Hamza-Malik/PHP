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
				<h2>Delete Admins</h2>

				<form action="de_add_record.php" method="POST">

				 <p>Select Admins you want to delete?</p>
				 <?php
				 foreach ($ad_admin as $ad_del) {
				 echo " <input type='checkbox' name='admin[]' value ='".$ad_del['admin_id']."'/> <p class='good'>".$ad_del['firstname'].'  '.$ad_del['surname']."</p><br>";
			 }
						?>

				 <input type="submit" name="del_admin" value="Delete Admin" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
