<div class="container p-5">
	<div id="messages"></div>
	<div class="row">
		<div class="col-12 text-right">
			<a href="#" type="button" class="btn btn-default font-weight-bold text-danger" data-toggle="modal" onclick="getAllSetFunc()" data-target="#allSet">All Sets</a>
		</div>
	</div>
	<br>
	
	
	<?php echo form_open_multipart('questions/add');?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<label for="set">In SET</label>
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
			<div class="col-md-7">
				<label for="question">Question</label>
				<input type="text" name="question" id="question" class="form-control" autocomplete="off">
			</div>
			<div class="col-md-3">
				<label>Question Image</label>
	    		<input name="Qimg" type="file" size="20">
			</div>
			<div class="col-md-2">
				<label for="options">Number of Options</label>
				<?php 
					$start;
					$limit = 10;
				?>
				<select id="options" class="form-control" name="options" required>
					<option value="" selected>Select..</option>
					<?php for($start = 1; $start<=$limit; $start++) : ?>
						<option value="<?=$start?>"><?=$start?></option>
					<?php endfor;?>
				</select>
			</div>
		</div>
		<div id="answerOption" class="mt-5"></div>
		<div class="row mt-4">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-outline-primary btn-block">Add Question</button>
			</div>
			<div class="col-md-4"></div>
		</div>
	</form>
</div>








<div class="container">
	<!-- View All Sets--Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="allSet">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<h5 class="modal-title float-left">Availabe Sets</h5>
	      	<a href="#" type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#addSet" onclick="closeFunc()">Add a Set</a>
	      </div>
	        <div class="modal-body">
	          	<table class="table text-center" id="viewAllSets"></table>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	    </div>
	  </div>
	</div>

	<!-- Add a Set -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addSet">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Add Set</h4>
	      </div>
	      <form role="form" action="<?php echo base_url('questions/addSet')?>" method="post" id="addForm">
	        <div class="modal-body">
	          <div id="messages"></div>
	          <div class="form-group">
	            <label for="d_name">Set Name</label>
	            <input type="text" class="form-control" id="" name="setName" placeholder="" autocomplete="off" required>
	            <label for="d_name">Question Limit</label>
	            <input type="text" class="form-control" id="" name="limit" autocomplete="off" required>
	            <label for="limit">Time Limit (In Minute)</label>
	            <input type="Number" class="form-control" id="" name="timelimit" autocomplete="off" required>
	            <label for="demo">Is Demo</label>
	            <select id="demo" class="form-control" name="demo" required>
					<option value="" selected>Select..</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
	          </div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button type="submit" class="btn btn-primary" >Save</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Edit A Set -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editSet">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Edit Set Name</h4>
	      </div>
	      <form role="form" action="<?php echo base_url('questions/updateSetName') ?>" method="post" id="updateForm">
	        <div class="modal-body">
	          <div id="messages"></div>
	          <div class="form-group">
	            <label for="name">Set Name</label>
	            <input type="text" class="form-control" id="setEditName" name="setEditName" autocomplete="off">
	          </div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button type="submit" class="btn btn-primary">Save changes</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
</div>


<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";

	function closeFunc(){
		$("#allSet").modal('hide');
	}

	function getAllSetFunc(){
	  $.ajax({
	    url: base_url + 'questions/getallSets',
	    type: 'post',
	    dataType: 'json',
	    success:function(data){
	    	$("#viewAllSets").html(data);
	    }
	  });
	}

	function editSetFunc(id){
	  $("#allSet").modal('hide');
	  $.ajax({
	    url: base_url + 'questions/fetchSetDataById/'+id,
	    type: 'post',
	    dataType: 'json',
	    success:function(response){

	      $("#setEditName").val(response.name);
	      $("#updateForm").unbind('submit').bind('submit', function(){
	        var form = $(this);

	        $(".text-danger").remove();

	        $.ajax({
	          url: form.attr('action') + '/' + id,
	          type: form.attr('method'),
	          data: form.serialize(),
	          dataType: 'json',
	          success:function(response) {
	            if(response.success === true){
	              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
	              '</div>');
	              
	              $("#allSet").modal('hide');
	              $("#editSet").modal('hide');
	              $("#updateForm .form-group").removeClass('has-error').removeClass('has-success');

	            }else{

	              if(response.messages instanceof Object){
	                $.each(response.messages, function(index, value){
	                  var id = $("#"+index);

	                  id.closest('.form-group')
	                  .removeClass('has-error')
	                  .removeClass('has-success')
	                  .addClass(value.length > 0 ? 'has-error' : 'has-success');

	                  id.after(value);

	                });
	              } else {
	                $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
	                  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
	                '</div>');
	              }
	            }
	          }
	        });
	        return false;
	      });
	    }
	  });
	}

	$('#options').on('change', function(){
       	var options = $(this).val();
       	var html = '';
       	var i;
        if (options!='') {
        	for(i=1; i<=options;i++){
        		/*html+='<input type="text" name="options[]" id="options_'+i+'" class="form-control"/>';*/
        		/*html += '<div class="row mt-3"><div class="col-md-5"><label for="ans['+i+']">Option '+i+'&nbsp;&nbsp;</label><input type="text" name="ans'+i+'" id="ans['+i+']" style = "width : 70%;"></div><div class="col-md-5"><label for="ansImg['+i+']">Ans Image '+i+'&nbsp;&nbsp;</label><input name="ansImg'+i+'" id="ansImg['+i+']" type="file" size="20"></div><div class="col-md-2"><input type="checkbox" class="form-check-input" id="ifans['+i+']"><label class="form-check-label" for="ifans['+i+']" value="1" name = "ifans'+i+'">If It Answer&nbsp;&nbsp;</label></div></div>';*/
        		/*html += '<div class="row mt-3"><div class="col-md-5"><label for="ans['+i+']">Option '+i+'&nbsp;&nbsp;</label><input type="text" name="ans'+i+'" id="ans['+i+']" style = "width : 70%;"></div><div class="col-md-5"><label for="ansImg['+i+']">Ans Image '+i+'&nbsp;&nbsp;</label><input name="ansImg'+i+'" id="ansImg['+i+']" type="file" size="20"></div><div class="col-md-2"><select id="ifans'+i+'" class="form-control" name="if_ans'+i+'" required><option value="0" selected>Not Answer</option><option value="1">It is Answer</option></select></div></div>';*/
        		html += '<div class="row mt-3"><div class="col-md-5"><label for="ans['+i+']">Option '+i+'&nbsp;&nbsp;</label><input type="text" autocomplete="off" name="ans'+i+'" id="ans['+i+']" style = "width : 70%;"></div><div class="col-md-5"><label for="ansImg['+i+']">Ans Image '+i+'&nbsp;&nbsp;</label><input name="ansImg'+i+'" id="ansImg['+i+']" type="file" size="20"></div><div class="col-md-2"><input type="radio" name="if_ans" value="'+i+'" required>&nbsp;&nbsp;If Ans</div></div>';
        	}
         $('#answerOption').html(html);
        }
        else {
         $('#answerOption').html('');
          
        }
   });
</script>