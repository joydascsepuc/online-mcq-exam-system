<style type="text/css">
	.width-25{
		width: 25% !important;
	}
</style>

<div class="container p-5">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<label for="set">Select SET</label>
		    <select id="set" class="form-control" name="set" required>
		    	<option value="" selected>Select..</option>
		        <?php foreach($sets as $set): ?>
		          <?php echo '<option value = "'.$set['id'].'">'.$set['name'].'</option>' ?>
		        <?php endforeach; ?>
		    </select>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row mt-5">
		<div class="col-12">
			<table class="table text-center" id="questionTable">
				
			</table>
		</div>
	</div>
</div>


<script type="text/javascript">
	var base_url = "<?php echo base_url();?>";
	$('#set').on('change', function(){
		var set = $("#set").val();
		if(set == ''){
		$('#questionTable').html("");
		}else{
		$.ajax({
		      url:base_url + 'questions/getQuestionsbySetID',
		      data:{
		      	'set' : set,
		      },
		      type: "POST",
		      dataType: 'json',
		      success: function(data){
		         $("#questionTable").html(data);
		      },
		  });
		}
	});
</script>