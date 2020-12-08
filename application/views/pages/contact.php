<style type="text/css">
	.form-control{
		border-radius: 2px;
	}	
</style>

<div class="container p-5">
	<div class="row text-justify">
		<div class="col-md-4">
			<p class="font-weight-bold">Address:</p>
			<p>Jalal Mansion (1st Floor), Nurbag R/A, Beside Central plaza, Nurbag R/A, O.R. Nijam road, GEC circle , GEC, Chittagong</p>
			<br>
			<p class="font-weight-bold">Mobile:</p>
			<p>+8801675-607126</p>
			<br>
			<p class="font-weight-bold">Hours of Open</p>
			<p>
				<span>Saturday : 9AM to 10PM</span><br>
				<span>Sunday : 9AM to 10PM</span><br>
				<span>Monday : 9AM to 10PM</span><br>
				<span>Tuesday : 9AM to 10PM</span><br>
				<span>Wednesday : 9AM to 10PM</span><br>
				<span>Thrusday : 9AM to 10PM</span><br>
				<span>Friday : 3PM to 8PM</span><br>
			</p>
			<br>
			<p class="font-weight-bold">Mailing Support</p>
			<p>murad.pu.dc@gmail.com</p>
			<br>
			<p class="font-weight-bold">Social Support</p>
			<p><a href="http://facebook.com/defencecare.ctg/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
			<a href="#" target="_blank" style="color: #1AADE3"><i class="fab fa-twitter fa-2x"></i></a>&nbsp;&nbsp;
         <a href="#" target="_blank" style="color: #E0584B"><i class="fas fa-envelope fa-2x"></i></a></p>
		</div>
		<div class="col-md-8">
			<form style="margin-top: 1rem;" action="<?php echo base_url()?>pages/sendMail" method="post">
				<input type="text" name="name" autocomplete="off" placeholder="Full Name" class="form-control" required>
				<br>
				<input type="mail" name="mail" placeholder="Mail Address" autocomplete="off" class="form-control" required>
				<br>
				<input type="text" name="subject" placeholder="Subject" autocomplete="off" class="form-control" required>
				<br>
				<textarea class="form-control" name="message" placeholder="Write Down Your Message Here..." style="height: 20rem;" required></textarea>

				<div class="row mt-4">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<button class="btn btn-outline-primary btn-block font-weight-bold" type="submit">Send Message</button>
					</div>
					<div class="col-sm-2"></div>
				</div>
			</form>
			
		</div>
	</div>
</div>