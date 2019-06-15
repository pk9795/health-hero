<?php include 'common/header.php'; ?>


<!-- BEGIN Get in touch section -->
<section class="get-in-touch content-wrapper">

	<h2 class="get-in-touch-title wow fadeInLeft" data-wow-duration=".5s" data-wow-delay=".5s">Get In Touch</h2>
	<div class="row no-gutters">
		<div class="col-md-8 col-sm-6">

			<form id="contactform" class="contact-form wow fadeInLeft" data-wow-duration=".5s" data-wow-delay=".5s">
				<div class="row" style="width: 100%;">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" name="name">
					</div>

					<div class="form-group">
						<label for="name">Name of your Organization</label>
						<input type="text" class="form-control" name="nameOrganization">
					</div>

					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" name="email">
					</div>

					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="text" class="form-control" name="phone">
					</div>

					<div class="form-group">
						<label for="identify">Identify yourself</label>
						<select class="form-control" name="identify">
							<option value="" disabled selected>Identify yourself</option>
							<option>Hospital</option>
							<option>Doctors</option>
							<option>Pharmacy</option>
							<option>Diagnostic Centre</option>
							<option>Patient</option>
							<option>Other</option>
						</select>
					</div>

					<div class="form-group form-check">
						<label class="form-check-label" for="exampleCheck1">Are You Existing Associate?</label>
						<input type="checkbox" class="form-check-input" name="existingAssociate">
					</div>

					<div class="clearfix"></div>

					<div class="form-group">
						<label for="description">Description</label>
						<textarea class="form-control" name="description" rows="6"></textarea>
					</div>

					<div class="form-group">
						<button type="submit" name="submit" class="btn-grad submit-btn">Submit</button>
					</div>
					<div class="form-group" style="width: 100%;">
						<div class="alert alert-success alert-dismissible  in" role="alert" id="info" style="display : none;"> <strong>Success !</strong> Thanks for writing to us, we will revert shortly. </div>
					</div>

					<!-- <button type="submit" class="btn-grad submit-btn">Submit</button> -->
				</div>
			</form>
		</div>

		<div class="col-md-4 col-sm-6">
			<div class="contact-detail">
				<div class="location contact-detail-bg wow fadeInRight" data-wow-duration=".5s" data-wow-delay=".5s">
					<img src="images/placeholder.png" width="31" height="45" class="icons">
					<span class="co">
						<h3 class="orange">Address</h3>
						<p>NirvIkar Consultancy LLP, Fourth Floor. <br>Spectrum Towers, Chincholi Bunder <br>Road, Malad West, Mumbai - 400 064</p>
					</span>
				</div>

				<div class="phone contact-detail-bg wow fadeInRight" data-wow-duration=".5s" data-wow-delay=".5s">
					<img src="images/phone.png" width="38" height="38" class="icons">
					<span class="co">
						<h3 class="sky">Phone</h3>
						<p>001) 123456789 - 234567891</p>
					</span>
				</div>

				<div class="email contact-detail-bg wow fadeInRight" data-wow-duration=".5s" data-wow-delay=".5s">
					<img src="images/email.png" width="38" height="27" class="icons">
					<span class="co">
						<h3 class="green">Email</h3>
						<p><a href="mailto:support@ehealthhero.com">support@ehealthhero.com</a></p>
					</span>
				</div>


			</div>
		</div>

	</div>



</section>

<!-- END Get in touch section -->

<?php include 'common/footer.php'; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
		$('#info').hide();
		$("#contactform").validate({
			// Specify validation rules
			rules: {
				// The key name on the left side is the name attribute
				// of an input field. Validation rules are defined
				// on the right side
				name: "required",
				nameOrganization: "required",
				existingAssociate: "required",
				description: "required",
				identify: "required",
				phone: {
					required: true,
					number: true,
					maxlength: 10
				},
				email: {
					required: true,
					email: true,
				}
			},
			// Make sure the form is submitted to the destination defined
			// in the "action" attribute of the form when valid
			submitHandler: function(form) {
				var formData = new FormData(form);
				$.ajax({
					type: "POST",
					url: 'ajax/contact-enquiry.php',
					data: formData,
					contentType: false,
					processData: false,
					success: function(data) {
						if (data == '1') {
							alert("Message not sent. Please retry")

						} else {
							// $(".submsg").show().html("<p>Message not sent. Please retry.</p>").fadeOut(5000);

							$('#contactform')[0].reset();
							$("#info").show().fadeOut(5000);
						}
					},
				});
			}
		});
	});
</script>