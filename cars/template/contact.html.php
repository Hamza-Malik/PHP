<main class="admin">

	<section class="right">

			<h2>Contact Us</h2>

			<form action="/message" method="POST" enctype="multipart/form-data">
				<!-- <input type="hidden" name="car_info[id]" value="<?=$car_var['id'] ?? ''?>" /> -->
				<label>Name</label>
				<input type="text" name="contact_info[contact_name]" value="" />

				<label>E-Mail</label>
				<input type="text" name="contact_info[contact_email]" value="" />
        <!-- Make a dropbox for contact -->

				<label>Option</label>

				<select name="contact_info[contact_option]">

					<option value="Suggestion">Suggestion</option>
						<option value="Complaint">Complaint</option>
						<option value="FeedBack">Feedback</option>


				</select>
				<label>Message</label>
				<textarea name="contact_info[contact_message]"></textarea>

				<input type="hidden" name="contact_info[contact_status]" value="Not Approved" />
				<input type="hidden" name="contact_info[contact_admin]" value="Not Assigned" />



				<input type="submit" name="submit_contact" value="Send" />

			</form>

</section>
</main>
