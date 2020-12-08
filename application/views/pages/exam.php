<!-- <div class="container p-5">
	<form action="<?php echo base_url()?>exam/loadexam" method="post" role="form" onsubmit="return confirm('Do you really want to start Exam?');">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<label for="set">Select Set</label>
				<select id="set" class="form-control" name="set" required>
			    	<option value="" selected>Select..</option>
			        <?php foreach($sets as $set): ?>
			          <?php echo '<option value = "'.$set['id'].'">'.$set['name'].'</option>' ?>
			        <?php endforeach; ?>
			    </select>
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="row mt-4">
			<div class="col-md-5"></div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-outline-primary btn-block">Start Exam</button>
			</div>
			<div class="col-md-5"></div>
		</div>
	</form>
</div> -->



<div class="container p-5 text-center">
	<?php $i=0?>
	<?php foreach($sets as $set):?>
		<a href="<?php echo base_url()?>exam/loadexam/<?=$set['id']?>" class="btn btn-outline-primary text-center" style="height: 70px; width: 250px;"><span style="vertical-align: center;"><?=$set['name'];?></span></a>
		<?php
			$i++;
			if($i%3==0) echo "<br><br><br><br>";
		?>
	<?php endforeach;?>
</div>