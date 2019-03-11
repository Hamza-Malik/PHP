<?php session_start(); ?>
<!DOCTYPE html>
                                                       <!-- Add Admin HTML page -->
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

				<h2>Add Artist</h2>

          <form  action="add_admin_record.php" method="POST" enctype="multipart/form-data">
            <label>Select Artist Profile image</label> <input type="file" name="image"/>
            <label>Artist First name :</label> <input type="text" name="a_name"/>
            <label>Artist Last name :</label> <input type="text"  name="a_s_name"/>

					<input type="submit" name="add_admin_btn" value="Add Artist" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
