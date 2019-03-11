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

				<h2>Edit Category</h2>

				<form action="edit_c_r.php" method="POST">

          <?php $cc= $pdo->query('SELECT * FROM csy2028.category WHERE cat_id = "'.$_POST['my_cat'].'"');
          foreach ($cc as $vv){
           ?>
           <p>Enter what you want to edit :</p>
            <label>New Category name</label> <input type="text" value="<?php echo $vv['cat_name'];?>" name="ctn" />
            <label>New Description on the category</label> <textarea name="dc"><?php echo $vv['description']; ?></textarea>

             <input type="hidden" name="ce" value="<?php echo $vv['cat_id'];}?>">
					<input type="submit" name="edit_c" value="Edit Category" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
