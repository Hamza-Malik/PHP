
	<main class="admin">
    <?php	require  '../template/admin_left_nav.html.php';?>

	<section class="right">
			<h2><?php if(isset($_GET['id'])){
                    echo "EDIT MANUFACTURER"."</h2>";
                }
                else{
                    echo "ADD MANUFACTURER"."</h2>";
                }
                ?>

			<form action="" method="POST">

				<input type="hidden" name="manufacture_info[id]" value="<?=$manufacturer_var['id'] ?? ''?>" />
				<label>Name</label>
				<input type="text" name="manufacture_info[name]" value="<?=$manufacturer_var['name'] ?? ''?>" />

                <?php if(isset($_GET['id'])){
                    echo '<input type="submit" name="submit" value="Save Manufacturer" />';
                }
                else{
                    echo '<input type="submit" name="submit" value="Add Manufacturer" />';
                }
                ?>


			</form>

</section>
	</main>
