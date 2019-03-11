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

				<h2>Edit Articles</h2>

				<form action="edit_artcle_rec.php" method="POST">

          <p>Select the article you want to edit :</p>

          <?php  foreach ($art as $k) {

            echo '<input type="radio" name="myradio" value="'.$k['article_id'].'" /><p class="good">'.$k['article_title'].'<p>';}
            ?>

					<input type="submit" name="editt" value="Edit Article" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
