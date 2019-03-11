<main class="admin">
<?php require  '../template/admin_left_nav.html.php';?>


<section class="right">

			<h2>Cars</h2>

			<a class="new" href="/edit_car">Add new car</a>

			<a class="new" href="/cars?show_archive=archived">Archived</a>

			<table>
			<thead>
			<tr>
			<th style="width: 4%">Model</th>
			<th style="width: 3%">Price</th>
                <th style="width: 3%">Posted By</th>

                <th style="width: 10%">&nbsp;</th>
			<th style="width: 10%">&nbsp;</th>
			<th style="width: 10%">&nbsp;</th>
			</tr>


<?php foreach($cars as $car){

	?>

				<tr>
				<td><?=$car['name']?></td>
				<td>£<?= $car['price'] ?></td>
                    <td><?= $car['car_author'] ?></td>

                    <td><a style="float: right" href="/edit_car?id=<?=$car['id']?>">Edit</a></td>
				<td><form method="post" action="/delete_car">
				<input type="hidden" name="id" value="<?=$car['id']?>" />

				<input type="submit" name="submit" value="Delete" />
				</form></td>
				<td><form method="POST" action="edit_car">
				<input type="hidden" name="archive_car" value="<?=$car['id']?>" />
				<?php
					if(isset($_GET['show_archive'])){
						echo '<input type="submit" name="car_unarchive" value="Unarchive" />';
					}
					else
					{	echo '<input type="submit" name="car_archive" value="Archive" />';
					}


				 ?>

				</form></td>

				</tr>
<?php }?>
			</thead>
			</table>
</section>
	</main>
