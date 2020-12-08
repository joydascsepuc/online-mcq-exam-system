<div class="container p-5">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 text-center">
			<span>We Prepare the Leaders</span>
			<h1 class="font-weight-bold mt-2 pb-0 mb-0 display-4">Defence Care</h1>
			<span>A Total Defence Coaching</span>
			<p class="font-weight-bold mt-4">Admission Form</p>
		</div>
		<div class="col-md-2"></div>
	</div>

	<?php echo form_open_multipart('students/add');?>
		<div class="row mt-5">
			<div class="col-sm-3">
				<label for="formNo">Form No</label>
				<input type="number" name="formNo" id="formNo" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-sm-6"></div>
			<div class="col-sm-3">
				<label for="adDate">Admission Date</label>
				<input type="date" name="adDate" id="adDate" class="form-control" autocomplete="off" required>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-5">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-3">
				<label for="dob">Date of Birth</label>
				<input type="date" value="2000-01-01" name="dob" id="dob" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-4">
				<label for="occupation">Occupation</label>
				<input type="text" name="occupation" id="occupation" class="form-control" autocomplete="off" required>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-5">
				<label for="sscint">SSC Institution</label>
				<input type="text" name="sscint" id="sscint" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-3">
				<label for="sscgroup">Group</label>
			    <select class="form-control" id="sscgroup" name="sscgroup" required>
			      <option selected value="">Choose...</option>
			      <option value="Science">Science</option>
			      <option value="Commerce">Commerce</option>
			      <option value="Art's">Art's</option>
			    </select>
			</div>
			<div class="col-md-2">
				<label for="sscresult">Result</label>
				<input type="text" name="sscresult" id="sscresult" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-2">
				<label for="sscyear">Year</label>
				<input type="text" name="sscyear" id="sscyear" class="form-control" autocomplete="off" required>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-5">
				<label for="hscint">HSC Institution</label>
				<input type="text" name="hscint" id="hscint" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-3">
				<label for="hscgroup">Group</label>
			    <select class="form-control" id="hscgroup" name="hscgroup" required>
			      <option selected value="">Choose...</option>
			      <option value="Science">Science</option>
			      <option value="Commerce">Commerce</option>
			      <option value="Art's">Art's</option>
			    </select>
			</div>
			<div class="col-md-2">
				<label for="hscresult">Result</label>
				<input type="text" name="hscresult" id="hscresult" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-2">
				<label for="hscyear">Year</label>
				<input type="text" name="hscyear" id="hscyear" class="form-control" autocomplete="off" required>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-5">
				<label for="uniname">University Name</label>
				<input type="text" name="uniname" id="uniname" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-3">
				<label for="unisubject">Subject</label>
				<input type="text" name="unisubject" id="unisubject" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-2">
				<label for="uniresult">Result</label>
				<input type="text" name="uniresult" id="uniresult" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-2">
				<label for="uniyear">Year</label>
				<input type="text" name="uniyear" id="uniyear" class="form-control" autocomplete="off" required>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-3">
				<label for="email">Email-ID</label>
				<input type="email" name="email" id="email" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="facebookid">Facebook ID</label>
				<input type="text" name="facebookid" id="facebookid" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="mobile">Mobile No</label>
				<input type="number" name="mobile" id="mobile" class="form-control" autocomplete="off" required>
			</div>
			<div class="col-md-3">
				<label for="bloodgroup">Blood Group</label>
			   	<select id="bloodgroup" class="form-control" name="bloodgroup">
			       	<option selected value="">Choose...</option>
		        	<option value="A+">A+</option>
		        	<option value="A-">A-</option>
		        	<option value="B+">B+</option>
		        	<option value="B-">B-</option>
		        	<option value="AB+">AB+</option>
		        	<option value="AB-">AB-</option>
		        	<option value="O+">O+</option>
		        	<option value="O-">O-</option>
		        	<option value="Unknown">Unknown</option>
		      	</select>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-4">
				<label for="fname">Father's Name</label>
				<input type="text" name="fname" id="fname" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="fmobile">Father's Mobile Number</label>
				<input type="number" name="fmobile" id="fmobile" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="foccu">Father's Occupation</label>
				<input type="text" name="foccu" id="foccu" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-4">
				<label for="mname">Mothers's Name</label>
				<input type="text" name="mname" id="mname" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="mmobile">Mothers's Mobile Number</label>
				<input type="number" name="mmobile" id="mmobile" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="moccu">Mothers's Occupation</label>
				<input type="text" name="moccu" id="moccu" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-6">
				<label for="present">Present Address</label>
				<textarea id="present" name="present" class="form-control" style="height: 10rem;"></textarea>
			</div>
			<div class="col-md-6">
				<label for="permanent">Permanent Address</label>
				<textarea id="permanent" name="permanent" class="form-control" style="height: 10rem;"></textarea>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-2">
				<label for="force">Force</label>
			   	<select id="force" class="form-control" name="force" required>
			       	<option selected value="">Choose...</option>
		        	<option value="Army">Army</option>
		        	<option value="Navy">Navy</option>
		        	<option value="Air Force">Air Force</option>
		      	</select>
			</div>
			<div class="col-md-2">
				<label for="course">Course</label>
			   	<select id="course" class="form-control" name="course" required>
			       	<option selected value="">Choose...</option>
		        	<option value="Long Course">Long Course</option>
		        	<option value="Short Course">Short Course</option>
		      	</select>
			</div>
			<div class="col-md-2">
				<label for="programme">Programme</label>
			   	<select id="programme" class="form-control" name="programme" required>
			       	<option selected value="">Choose...</option>
		        	<option value="Preliminary">Preliminary</option>
		        	<option value="Written">Written</option>
		        	<option value="Regular ISSB">Regular ISSB</option>
		        	<option value="Special Bullet Batch">Special Bullet Batch</option>
		      	</select>
			</div>
			<div class="col-md-3">
				<label for="courseno">Course No</label>
				<input type="text" name="courseno" id="courseno" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="examdate">ISSB/Preliminary Exam Date</label>
				<input type="date" name="examdate" id="examdate" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-outline-primary btn-block">Store Student Information</button>
			</div>
			<div class="col-md-4"></div>
		</div>
	</form>
</div>