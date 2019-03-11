<main class="admin">
    <?php require '../database.php'; ?>

    <section class="left">
        <ul>
<!--            --><?php
//
//            foreach ($manufacturers as $key) {
//                ?>
<!--                <li><a href="manufacturername=--><?php //echo $key['name'];?><!-- & manufacturerId=--><?php //echo $key['id'];?><!-- ">--><?php //echo $key['name']; ?><!--</a></li>-->
<!--                --><?php
//
//            }
//
//
//            ?>
        </ul>
    </section>

    <section class="right">
        <h1> Extra Images</h1>

<?php foreach ($car_image as $carImage){
    $dir="images/cars/".$carImage['id'];



    if($opendir=opendir($dir)){
        while(($file=readdir($opendir)) !==FALSE ){
           if($file!="." && $file!=".."){
               // echo $dir."/".$file;
                echo "<a href='$dir/$file'><img class='car_image' src='$dir/$file' width='150px' height='150px' ></a>";
        }
        }
    }
}


?>
        <form action="/smartpayhpp256" method="POST" enctype="multipart/form-data">
            <input type="submit" name="$carImage['id']" value="Buy"/>
           </form>
    </section>
</main>
