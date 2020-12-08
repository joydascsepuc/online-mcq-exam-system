<div class="container p-5">
<?php foreach($students as $student): ?>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 text-center">
			<span>We Prepare the Leaders</span>
			<h1 class="font-weight-bold mt-2 pb-0 mb-0 display-4">Defence Care</h1>
			<span>A Total Defence Coaching</span>
			<p class="font-weight-bold mt-4">Edit Student Information</p>
		</div>
		<div class="col-md-2"></div>
	</div>

	<?php echo form_open_multipart('students/update');?>
		<div class="row mt-5">
			<div class="col-sm-3">
				<label for="formNo">Form No</label>
				<input type="number" value="<?=$student['form_no']?>" name="formNo" id="formNo" class="form-control" autocomplete="off">
			</div>
			<div class="col-sm-6"></div>
			<div class="col-sm-3">
				<label for="adDate">Admission Date</label>
				<input type="date" value="<?=$student['admission_date']?>" name="adDate" id="adDate" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-5">
				<label for="name">Name</label>
				<input type="text" value="<?=$student['name']?>" name="name" id="name" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="dob">Date of Birth</label>
				<input type="date" value="<?=$student['date_of_birth']?>" name="dob" id="dob" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="occupation">Occupation</label>
				<input type="text" value="<?=$student['occupation']?>" name="occupation" id="occupation" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-5">
				<label for="sscint">SSC Institution</label>
				<input type="text" value="<?=$student['ssc_ins']?>" name="sscint" id="sscint" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="sscgroup">Group</label>
			    <select class="form-control" id="sscgroup" name="sscgroup">
			      <?php $option = $student['ssc_group'];?>
			      <option selected value="">Choose...</option>
			      <option value="Science" <?php if($option == "Science") echo 'selected'?> >Science</option>
			      <option value="Commerce" <?php if($option == "Commerce") echo 'selected'?> >Commerce</option>
			      <option value="Art's" <?php if($option == "Art's") echo 'selected'?>>Art's</option>
			    </select>
			</div>
			<div class="col-md-2">
				<label for="sscresult">Result</label>
				<input type="text" value="<?=$student['ssc_result']?>" name="sscresult" id="sscresult" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-2">
				<label for="sscyear">Year</label>
				<input type="text" value="<?=$student['ssc_year']?>" name="sscyear" id="sscyear" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-5">
				<label for="hscint">HSC Institution</label>
				<input type="text" value="<?=$student['hsc_ins']?>" name="hscint" id="hscint" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="hscgroup">Group</label>
			    <select class="form-control" id="hscgroup" name="hscgroup" required>
			    	<?php $option = $student['hsc_group'];?>
			      <option selected value="">Choose...</option>
			      <option value="Science" <?php if($option == "Science") echo 'selected'?>>Science</option>
			      <option value="Commerce" <?php if($option == "Commerce") echo 'selected'?>>Commerce</option>
			      <option value="Art's" <?php if($option == "Art's") echo 'selected'?>>Art's</option>
			    </select>
			</div>
			<div class="col-md-2">
				<label for="hscresult">Result</label>
				<input type="text" value="<?=$student['hsc_result']?>" name="hscresult" id="hscresult" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-2">
				<label for="hscyear">Year</label>
				<input type="text" value="<?=$student['hsc_year']?>" name="hscyear" id="hscyear" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-5">
				<label for="uniname">University Name</label>
				<input type="text" value="<?=$student['uni_name']?>" name="uniname" id="uniname" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="unisubject">Subject</label>
				<input type="text" value="<?=$student['uni_subject']?>" name="unisubject" id="unisubject" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-2">
				<label for="uniresult">Result</label>
				<input type="text" value="<?=$student['uni_result']?>" name="uniresult" id="uniresult" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-2">
				<label for="uniyear">Year</label>
				<input type="text" value="<?=$student['uni_year']?>" name="uniyear" id="uniyear" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-3">
				<label for="email">Email-ID</label>
				<input type="email" value="<?=$student['email']?>" name="email" id="email" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="facebookid">Facebook ID</label>
				<input type="text" value="<?=$student['facebook']?>" name="facebookid" id="facebookid" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="mobile">Mobile No</label>
				<input type="number" value="<?=$student['mobile']?>" name="mobile" id="mobile" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="bloodgroup">Blood Group</label>
			   	<select id="bloodgroup" class="form-control" name="bloodgroup">
			   		<?php $option = $student['blood_group']?>
			       	<option selected value="">Choose...</option>
		        	<option value="A+" <?php if($option == "A+") echo 'selected'?> >A+</option>
		        	<option value="A-" <?php if($option == "A-") echo 'selected'?> >A-</option>
		        	<option value="B+" <?php if($option == "B+") echo 'selected'?>>B+</option>
		        	<option value="B-" <?php if($option == "B-") echo 'selected'?>>B-</option>
		        	<option value="AB+" <?php if($option == "AB+") echo 'selected'?>>AB+</option>
		        	<option value="AB-" <?php if($option == "AB-") echo 'selected'?>>AB-</option>
		        	<option value="O+" <?php if($option == "O+") echo 'selected'?>>O+</option>
		        	<option value="O-" <?php if($option == "O-") echo 'selected'?>>O-</option>
		        	<option value="Unknown" <?php if($option == "Unknown") echo 'selected'?>>Unknown</option>
		      	</select>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-4">
				<label for="fname">Father's Name</label>
				<input type="text" value="<?=$student['f_name']?>" name="fname" id="fname" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="fmobile">Father's Mobile Number</label>
				<input type="number" value="<?=$student['f_mobile']?>" name="fmobile" id="fmobile" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="foccu">Father's Occupation</label>
				<input type="text" value="<?=$student['f_occu']?>" name="foccu" id="foccu" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-4">
				<label for="mname">Mothers's Name</label>
				<input type="text" value="<?=$student['m_name']?>" name="mname" id="mname" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="mmobile">Mothers's Mobile Number</label>
				<input type="number" value="<?=$student['m_mobile']?>" name="mmobile" id="mmobile" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-4">
				<label for="moccu">Mothers's Occupation</label>
				<input type="text" value="<?=$student['m_occu']?>" name="moccu" id="moccu" class="form-control" autocomplete="off">
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-6">
				<label for="present">Present Address</label>
				<textarea id="present" name="present" class="form-control" style="height: 10rem;"><?=$student['present']?></textarea>
			</div>
			<div class="col-md-6">
				<label for="permanent">Permanent Address</label>
				<textarea id="permanent" name="permanent" class="form-control" style="height: 10rem;"><?=$student['permanent']?></textarea>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-2">
				<label for="force">Force</label>
			   	<select id="force" class="form-control" name="force">
			   		<?php $option = $student['for_force']?>
			       	<option selected value="">Choose...</option>
		        	<option value="Army" <?php if($option == "Army") echo 'selected'?>>Army</option>
		        	<option value="Navy" <?php if($option == "Navy") echo 'selected'?>>Navy</option>
		        	<option value="Air Force" <?php if($option == "Air Force") echo 'selected'?>>Air Force</option>
		      	</select>
			</div>
			<div class="col-md-2">
				<label for="course">Course</label>
			   	<select id="course" class="form-control" name="course">
			   		<?php $option = $student['course']?>
			       	<option selected value="">Choose...</option>
		        	<option value="Long Course" <?php if($option == "Long Course") echo 'selected'?>>Long Course</option>
		        	<option value="Short Course" <?php if($option == "Short Course") echo 'selected'?>>Short Course</option>
		      	</select>
			</div>
			<div class="col-md-2">
				<label for="programme">Programme</label>
			   	<select id="programme" class="form-control" name="programme">
			   		<?php $option = $student['programme']?>
			       	<option selected value="">Choose...</option>
		        	<option value="Preliminary" <?php if($option == "Preliminary") echo 'selected'?>>Preliminary</option>
		        	<option value="Written" <?php if($option == "Written") echo 'selected'?>>Written</option>
		        	<option value="Regular ISSB" <?php if($option == "Regular ISSB") echo 'selected'?>>Regular ISSB</option>
		        	<option value="Special Bullet Batch" <?php if($option == "Special Bullet Batch") echo 'selected'?>>Special Bullet Batch</option>
		      	</select>
			</div>
			<div class="col-md-3">
				<label for="courseno">Course No</label>
				<input type="text" value="<?=$student['course_no']?>" name="courseno" id="courseno" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label for="examdate">ISSB/Preliminary Exam Date</label>
				<input type="date" value="<?=$student['exam_date']?>" name="examdate" id="examdate" class="form-control" autocomplete="off">
			</div>
		</div>
		<input type="hidden" name="id" value="<?=$student['id']?>">
		<?php endforeach;?>

		<div class="row mt-5">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-outline-primary btn-block">Update Student Information</button>
			</div>
			<div class="col-md-4"></div>
		</div>
	</form>
</div>