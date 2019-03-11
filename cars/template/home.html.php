<main class="home">

    <?php require '../database.php'; ?>

    <section class="right">

        <h1>Latest Articles</h1>

        <ul class="cars">

            <?php
            foreach ($articles as $key) {

                    ?>
                    <li>
                        <?php

                        echo '<a href="/images/article/'.$key['id'].'.jpg"><img src="/images/article/'.$key['id'].'.jpg"/></a>';

                        ?>
                        <div class="details">
                            <h3>Title : <?=$key['article_title']?></h3>
                            <h3>Posted by : <?=$key['article_author']?></h3>
                            <h3>Posted on : <?=$key['article_date']?></h3>
                            <h3><?=$key['article_content']?></h3>


                        </div>
                    </li>

                <?php

            } ?>

        </ul>

    </section>

</main>
