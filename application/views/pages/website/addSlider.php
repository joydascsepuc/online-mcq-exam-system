<div class="container p-5">
	<?php echo form_open_multipart('website/addSlider');?>
		<div class="form-group">
	    	<label for="title">Slider Title</label>
	    	<input type="text" class="form-control" id="title" placeholder="Slider Title" name="title" required autocomplete="off">
	  	</div>
	  	<div class="form-group">
	    	<label for="note">Note</label>
	    	<textarea class="form-control" id="note" placeholder="Slider Note" name="note" style="height: 10rem;" required autocomplete="off"></textarea>
	  	</div>
	  	<div class="form-group">
	    	<label>Slider Image</label>
	    	<input name="img" type="file" size="20" required>
	  	</div>
	  	<div class="row">
	  		<div class="col-md-4"></div>
	  		<div class="col-md-4">
	  			<button type="submit" class="btn btn-outline-primary btn-block">Add Slider</button>
	  		</div>
	  		<div class="col-md-4"></div>
	  	</div>
	</form>
</div>