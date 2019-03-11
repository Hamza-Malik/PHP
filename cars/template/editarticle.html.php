<main class="admin">


<?php	require  '../template/admin_left_nav.html.php';?>
	<section class="right">

			<h2> <?php if(isset($_GET['id'])){
                    echo "EDIT ARTICLE"."</h2>";
                }
                else{
                    echo "ADD ARTICLE"."</h2>";
                }
                ?>

        <?php
        $date = new DateTime();

        	$dates = $date->format('Y-m-d H:i:s');

        ?>

			<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="article_info[id]" value="<?=$article_var['id'] ?? ''?>" />
				<label>Article Title</label>
				<input type="text" name="article_info[article_title]" value="<?=$article_var['article_title'] ?? ''?>" />
                <input type="hidden" name="article_info[article_date]" value="<?= $dates?? ''?>" />
                <label>Article Content</label>
                <textarea name="article_info[article_content]"><?=$article_var['article_content'] ?? ''?></textarea>

                <input type="hidden" name="article_info[article_author]" value="<?=$_SESSION['admin_name'] ?? ''?>" />

                <label>Article Image</label>

				<input type="file" name="image" />
                <?php if(isset($_GET['id'])){
                    echo '<input type="submit" name="submit_image" value="Save Article" />';
                }
                else{
                    echo '<input type="submit" name="submit_image" value="Add Article" />';
                }
                ?>




			</form>

</section>
</main>
