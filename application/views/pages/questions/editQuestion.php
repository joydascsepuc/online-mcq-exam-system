<div class="container p-5">
	<div id="messages"></div>
	<?php foreach($questions as $question): ?>
		<div class="row">
			<div class="col-md-6">
				<p class="font-weight-bold">The Question</p>
			</div>
			<div class="col-md-6 text-right">
				<a href="#" class="font-weight-bold" data-toggle="modal" onclick = "editQuestionFunc(<?=$question['id']?>)" data-target="#editQuestionModel">Edit Question Part</a>
			</div>
		</div>
		<table class="table table-striped table-light text-center">
			<tbody>
				<tr>
		 			<th>Question</th>
		 			<td><?=$question['name'];?></td>
		 		</tr>
		 		<tr>
		 			<th>In Set</th>
		 			<td><?=$question['set_id'];?></td>
		 		</tr>
		 		<tr>
		 			<th>Qustion Image</th>
		 			<td><img src="<?php echo base_url();?>assets/images/questions/<?=$question['img']?>" style = "height: 60px;"></td>
		 		</tr>
			</tbody>
		</table>

		<input type="hidden" name="questionID" id="questionID" value="<?=$question['id']?>">
	<?php endforeach;?>

	<div class="row mt-5 mb-5">
		<div class="col-md-6">
			<p class="font-weight-bold">Options of This Questions</p>
		</div>
		<div class="col-md-6 text-right">
			<a href="#" class="font-weight-bold" data-toggle="modal" onclick="addID()" data-target="#addSingleOptionModal">Add an Option</a>
		</div>
	</div>
	<table class="table text-center">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Option Details</th>
				<th>Option Image</th>
				<th>Is Ans?</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;?>
			<?php foreach($answers as $answer):?>
				<?php
					$a = $answer['is_ans'];
					if($a == 1){
						$value = "Yes";
					}else{
						$value = "No";
					}
				?>
				<tr>
					<td><?=$i?></td>
					<td><?=$answer['name']?></td>
					<td><img src="<?php echo base_url();?>assets/images/questions/<?=$answer['img']?>" style = "height: 60px;"></td>
					<td><?=$value?></td>
					<td>
						<button class="btn btn-default" onclick="editAnsFunc(<?=$answer['id']?>)" data-toggle="modal" data-target="#editAnsModal"><i class="far fa-edit"></i></button>
						<a href="<?php echo base_url()?>questions/editAnOption/<?=$answer['id']?>" class="btn"><i class="far fa-trash-alt"></i></a>
					</td>
				</tr>
			<?php $i++;?>
			<?php endforeach;?>
		</tbody>
	</table>
</div>

<div class="container">
	<!-- For Edit Option -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editAnsModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Edit This Option</h4>
	      </div>

	      <form role="form" action="<?php echo base_url('questions/updateSingleOption') ?>" method="post" enctype="multipart/form-data" id="updateForm">
	        <div class="modal-body">
	          <div id="messages"></div>
	          <div class="form-group">
	            <label for="name">Option Text</label>
	            <input type="text" class="form-control" id="name" name="name" placeholder="" autocomplete="off">
	            <label class="mt-3 mb-3">Upload New Image</label>
	    		<input name="ansImg" id="ansImg" type="file" size="20">
	    		<select id="ifans" class="form-control" name="if_ans" required>
	    			<?php $option = '';?>
	    			<option value="0">Not Answer</option>
	    			<option value="1">It is Answer</option>
	    		</select>
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

	<!-- For Add an Option -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addSingleOptionModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Add an Option</h4>
	      </div>

	      <form role="form" action="<?php echo base_url('questions/addSingleOption') ?>" method="post" enctype="multipart/form-data" id="addForm">
	        <div class="modal-body">
	          <div id="messages"></div>
	          <div class="form-group">
	            <label for="opname">Option Text</label>
	            <input type="text" class="form-control" id="opname" name="opname" placeholder="" autocomplete="off">
	            <label class="mt-3 mb-3">Option Image</label>
	    		<input name="opImg" id="opImg" type="file" size="20">
	    		<select id="opifans" class="form-control" name="opifans" required>
	    			<option value="" selected>Select...</option>
	    			<option value="0">Not Answer</option>
	    			<option value="1">It is Answer</option>
	    		</select>
	    		<input type="hidden" name="Qid" id="Qid">
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

	<!-- For Edit Question Part -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editQuestionModel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Edit Question Part</h4>
	      </div>

	      <form role="form" action="<?php echo base_url('questions/updateQuestion') ?>" method="post" enctype="multipart/form-data" id="updateForm2">
	        <div class="modal-body">
	          <div id="messages"></div>
	          <div class="form-group">
	            <label for="name">Question Text</label>
	            <input type="text" class="form-control" id="qname" name="qname" placeholder="" autocomplete="off">
	            <label class="mt-3 mb-3">Upload New Image</label>
	    		<input name="qImg" id="qImg" type="file" size="20">
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
	var base_url = "<?php echo base_url();?>";

	/*For Edit Single Option*/
	function editAnsFunc(id){
	  $.ajax({
	    url: base_url + 'questions/fetchOptionDataById/'+id,
	    type: 'post',
	    dataType: 'json',
	    success:function(response){

	      $("#name").val(response.name);
	      $("#ifans").val(response.is_ans);
	      $("#updateForm").unbind('submit').bind('submit', function(){
	        var form = $(this);
	        $(".text-danger").remove();
	        $.ajax({
	          url: form.attr('action') + '/' + id,
	          type: form.attr('method'),
	          mimeType: form.attr('enctype'),
	          data:new FormData(this),
	          processData:false,
			  contentType:false,
	          cache:false,
	          async:false,
	          dataType: 'json',
	          success:function(response){
	            if(response.success === true){
	              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
	              '</div>');

	              $("#editAnsModal").modal('hide');
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

	function editQuestionFunc(id){
	  $.ajax({
	    url: base_url + 'questions/fetchQuestionDataById/'+id,
	    type: 'post',
	    dataType: 'json',
	    success:function(response){

	      $("#qname").val(response.name);
	      $("#updateForm2").unbind('submit').bind('submit', function(){
	        var form = $(this);
	        $(".text-danger").remove();
	        $.ajax({
	          url: form.attr('action') + '/' + id,
	          type: form.attr('method'),
	          mimeType: form.attr('enctype'),
	          data:new FormData(this),
	          processData:false,
			  contentType:false,
	          cache:false,
	          async:false,
	          dataType: 'json',
	          success:function(response) {
	            if(response.success === true){
	              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
	                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
	                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
	              '</div>');

	              $("#editQuestionModel").modal('hide');
	              $("#updateForm2 .form-group").removeClass('has-error').removeClass('has-success');

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

	function addID(){
		var id = $("#questionID").val();
		$("#Qid").val(id);
	}

	$("#addForm").unbind('submit').bind('submit', function(){
        var form = $(this);
        $(".text-danger").remove();
        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          mimeType: form.attr('enctype'),
          data:new FormData(this),
	      processData:false,
		  contentType:false,
	      cache:false,
	      async:false,
	      dataType: 'json',
          success:function(response){
            if(response.success === true){
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
              '</div>');

              $("#addSingleOptionModal").modal('hide');
              $("#addForm .form-group").removeClass('has-error').removeClass('has-success');

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


</script>