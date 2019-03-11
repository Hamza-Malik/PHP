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
				<h2>Delete Articles</h2>

				<form action="de_art_record.php" method="POST">

				 <p>Select the Articles you want to delete?</p>
				 <?php
				 foreach ($art as $ti) {
				 echo " <input type='checkbox' name='article[]' value ='".$ti['article_id']."'/> <p class='good'>".$ti['article_title']."</p><br>";
			 }
						?>

				 <input type="submit" name="del_art" value="Delete Article" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
