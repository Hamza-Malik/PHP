<main class="admin">
<?php require  '../template/admin_left_nav.html.php';?>


<section class="right">

			<h2>Articles</h2>
			<a class="new" href="/edit_article">Add Article</a>


			<table>
			<thead>
			<tr>
			<th style="width: 5%">Article Title</th>
			<th style="width: 5%">Article Content</th>
			<th style="width: 5%">Article Date</th>
			<th style="width: 5%">Article Author</th>
            <th style="width: 5%"></th>
			<th style="width: 5%"></th>
			</tr>


<?php foreach($articles as $contact){
 ?>

 <tr>
 <td><?=$contact['article_title']?></td>
 <td><?=$contact['article_content']?></td>
 <td><?=$contact['article_date']?></td>
 <td><?=$contact['article_author']?></td>
 <td><a style="float: right" href="/edit_article?id=<?=$contact['id']?>">Edit</a></td>
 <td><form method="post" action="/delete_article">
 <input type="hidden" name="id" value="<?=$contact['id']?>" />
 <input type="submit" name="submit" value="Delete" />
 </form></td>
				</tr>
<?php
}
?>
			</thead>
			</table>
</section>
	</main>
