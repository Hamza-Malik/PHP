<main class="admin">
<?php require  '../template/admin_left_nav.html.php';?>


<section class="right">

			<h2>Messages</h2>
			<a class="new" href="/message?app=approved">Approved</a>


			<table>
			<thead>
			<tr>
			<th style="width: 5%">Name</th>
			<th style="width: 5%">E-Mail</th>
			<th style="width: 5%">Option</th>
			<th style="width: 5%">Message</th>
      <th style="width: 5%">Status</th>
			<th style="width: 5%">By</th>
      <th style="width: 5%"></th>




			</tr>


<?php foreach($contacts as $contact){
	    ?>

				<tr>
				<td><?=$contact['contact_name']?></td>
				<td><?= $contact['contact_email'] ?></td>
				<td><?= $contact['contact_option'] ?></td>
				<td><?= $contact['contact_message'] ?></td>
        <td><?= $contact['contact_status'] ?></td>
				<td><?= $contact['contact_admin'] ?></td>


				<td><form method="POST" action="/message">
				<input type="hidden" name="contact_id" value="<?=$contact['id']?>" />
				<input type="hidden" name="contact_admin" value="<?=$_SESSION['admin_name']?>" />
                    <?php    if(isset($_GET['app'])) { ?>
                        <?php
                    }
else{
                        ?>
                        <input type="submit" name="submit_approve" value="Approve">
<?php
                    }
?>
                    </form></td>

				</tr>
<?php

}
?>

			</thead>
			</table>
</section>
	</main>
