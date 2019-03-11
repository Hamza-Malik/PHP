<?php session_start(); ?>
<!DOCTYPE html>
                                       <!-- Contact us Page -->
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

				<h2>Viewers Messages</h2>

				 <form>
         </form>


			       <?php  foreach ($view_message as $msg) {
                $tr=date('F jS Y', strtotime($msg['date_mes']));
				        echo "<div class='ms'><div class='mii'><h3 class='tag'>Sender name : </h3>
                <p class='nn'>".$msg['firstname']." ".$msg['lastname']."</p><h3 class='g'>Sent date : </h3>
                <p class='n'>".$tr."</p></p><h3 class='g'>Email : </h3>
                <p class='n'>".$msg['email']."</p><h3 class='m_h'>Message</h3><p class='mse'>".$msg['message']."</p></div></div>";
				     } ?>

			</article>
		</main>

		<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
