<?php session_start(); ?>
<!DOCTYPE html>
                                                   <!-- Admin Approving comments -->
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
				<h2>Approve Comments</h2>

				<form action="de_comment.php" method="POST">

				 <p>Select the comments you want to Approve? Comment you will select will show on the screen.</p>
				 <?php
				 foreach ($coment as $disapprove) {
           if($disapprove['type']==='no'){
				 echo " <input type='checkbox' name='comment[]' value ='".$disapprove['comment_id']."'/>
				  <p class='good'>".$disapprove['comment_text']."</p><br>";
			 }}

			 foreach ($nest_coment as $n_comment) {
				 if($n_comment['type']==='no'){
			 echo " <input type='checkbox' name='nest_comment[]' value ='".$n_comment['nested_id']."'/>
				<p class='good'>".$n_comment['nested_comment']."</p><br>";
		 }}


						?>

				 <input type="submit" name="diss_cmnt" value="Approve Comments" />
				</form>
			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
