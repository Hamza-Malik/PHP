
	<main class="admin">

    <?php require  '../template/admin_left_nav.html.php';?>

	<section class="right">

			<h2>Manufacturers</h2>

			<a class="new" href="/edit_manufacturer">Add new manufacturer</a>

			<?php
			echo '<table>';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

		//	$categories = $pdo->query('SELECT * FROM manufacturers');

			foreach ($manufacturers as $category) {
				echo '<tr>';
				echo '<td>' . $category['name'] . '</td>';
				echo '<td><a style="float: right" href="/edit_manufacturer?id=' . $category['id'] . '">Edit</a></td>';
				echo '<td><form method="post" action="/delete_manufacturer">
				<input type="hidden" name="id" value="' . $category['id'] . '" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>';
				echo '</tr>';
			}

			echo '</thead>';
			echo '</table>';


	?>

</section>
	</main>
