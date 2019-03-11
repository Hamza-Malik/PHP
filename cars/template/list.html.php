<main class="admin">
  <?php require '../database.php'; ?>

	<section class="left">
		<ul>
			<?php

      foreach ($manufacturers as $key) {
        ?>
      <li><a href="?manufacturername=<?php echo $key['name'];?> & manufacturerId=<?php echo $key['id'];?> "><?php echo $key['name']; ?></a></li>
   <?php

     }


     ?>
		</ul>
	</section>

	<section class="right">


        <?php
        if(isset($manufacture_name)){ ?>
        <h1> <?php echo $manufacture_name; ?></h1>
        <?php
        }
            else{?>
                <h1> Our Cars</h1>

         <?php   }

        ?>


	<ul class="cars">

    <?php
    foreach ($cars as $key) {

      if($key['archive_car']==='Unarchive'){ //To display only unarchive cars
        ?>
<li>

        <a href="/display_image?show_id=<?=$key['id']?>"><img src="/images/cars/<?=$key['id']?>/0.jpg"/></a>
<?php
      $manufactureTable = new \CSY2028\ DatabaseTable($pdo, 'manufacturers', 'id');
      $manufactureController = new Ijdb\Controllers\ManufactureController($manufactureTable);
      $var_manufacture=$manufactureController->find('id',$key['manufacturerId']);

      ?>
<div class="details">
  <h2><?=$var_manufacture['0']['1']?><?=$key['name']?></h2>
    <h3>Posted by : <?=$key['car_author']?></h3>

    <h3>Previous Price : £<?=$key['pre_price']?></h3>
    <h3>Current Price : £<?=$key['price']?></h3>
    <h3>Engine Type : <?=$key['car_engineType']?></h3>
    <h3>Mileage : <?=$key['car_mileage']?> Km/h</h3>
    <h3><?=$key['description']?></h3>




</div>
</li>

<?php
    }
 } ?>

</ul>

</section>
	</main>
