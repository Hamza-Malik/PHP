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

				<form action="edit_ad_r.php" method="POST">

          <?php $adm= $pdo->query('SELECT * FROM csy2028.admins WHERE admin_id = "'.$_POST ['myradio_ad'].'"');
          foreach ($adm as $ad_v){
           ?>
          <p>Enter what you want to edit :</p>

            <label>New First Name</label> <input type="text" value="<?php echo $ad_v['firstname'];?>" name="f_i" />
            <label>New Last Name</label> <input type="text" value="<?php echo $ad_v['surname']; ?>" name="s_i"/>
            <label>New Email</label> <input type="text" value="<?php echo $ad_v['email']; ?>" name="e_a"/>
            <label>New Password</label> <input type="password" name="p_a"/>

             <input type="hidden" name="ad_pass" value="<?php echo $ad_v['password'];?>">
             <input type="hidden" name="ad_id" value="<?php echo $ad_v['admin_id'];}?>">

					<input type="submit" name="edit_ad" value="Edit Admin" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
