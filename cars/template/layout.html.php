<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title><?= $title ?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<img src="/images/logo.png"/>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/home">Home</a></li>
			<li><a href="/showcars">Showroom</a></li>
			<li><a href="/about">About Us</a></li>
			<li><a href="/contact">Contact us</a></li>
			<li><a href="/clairs">Claire’s Careers</a></li>
<!--			-->
            <?php //var_dump($_SESSION['admin']);
            //session_start();
            ?>

            <?php if(isset($_SESSION['admin']) && $_SESSION['admin']===true){ ?>

				<li><a href="/logout">Log Out</a></li>
<!--			--><?php //}
//			 else if(isset($_SESSION['admin'])){ ?>
<!--					<li><a href="/login">Log In</a></li>-->
			<?php }
			else{
			 ?>
<li><a href="/login">Log In</a></li>
<?php } ?>
		</ul>
	</nav>
		<img src="/images/randombanner.php"/>

<!-- output is the main daata on page -->
<?= $output ?>

	<footer>
		&copy; Claire's Cars 2018
	</footer>
</body>
</html>
