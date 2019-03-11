<main class="admin">

<?php	require  '../template/admin_left_nav.html.php';?>
	<section class="right">

			<h2><?php if(isset($_GET['id'])){
                    echo "EDIT CAR"."</h2>";
                }
                else{
                    echo "ADD CAR"."</h2>";
                }
                ?>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="car_info[id]" value="<?=$car_var['id'] ?? ''?>" />
                <input type="hidden" name="car_info[car_author]" value="<?=$_SESSION['admin_name'] ?? ''?>" />

                <label>Car Model</label>
				<input type="text" name="car_info[name]" value="<?=$car_var['name'] ?? ''?>" />


				<label>Description</label>
				<textarea name="car_info[description]"><?=$car_var['description'] ?? ''?></textarea>

				<label>Price</label>
				<input type="text" name="car_info[price]" value="<?=$car_var['price'] ?? ''?>" />

				<label>Previous Price</label>
				<input type="text" name="car_info[pre_price]" value="<?=$car_var['pre_price'] ?? ''?>" />

				<label>Mileage</label>
				<input type="text" name="car_info[car_mileage]" value="<?=$car_var['car_mileage'] ?? ''?>" />

				<label>Engine Type</label>
				<input type="text" name="car_info[car_engineType]" value="<?=$car_var['car_engineType'] ?? ''?>" />

				<label>Category</label>

				<select name="car_info[manufacturerId]">

				<?php 		foreach ($manufacturers_var as $key) {
            if($key['id']==$car_var['manufacturerId']){?>

	         <option selected="selected" value="<?=$key['id']?>"><?=$key['name'] ?></option>
	       <?php
				}
				else{
					?>
						<option value="<?=$key['id']?>"><?=$key['name'] ?></option>
					<?php
}
				 }?>



				</select>

				<label>Image</label>

				<!-- var_dump($_FILES[image]); -->

				<input type="file" name="image[]" multiple />
                <?php if(isset($_GET['id'])){
                    echo '<input type="submit" name="submit" value="Save Car" />';
                }
                else{
                    echo '<input type="submit" name="submit" value="Add Car" />';
                }
                ?>


			</form>

</section>
</main>
