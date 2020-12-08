<div class="container p-5">
	<div class="row text-center">
		<div class="col-md-4">
			<span style="background-color: green; border: 1px solid black; padding: 10px 40px;"></span>&nbsp;&nbsp;&nbsp;
			<span>Answered</span>
		</div>
		<div class="col-md-4">
			<span style="background-color: #007BFF; border: 1px solid black; padding: 10px 40px;"></span>&nbsp;&nbsp;&nbsp;
			<span>Current Question</span>
		</div>
		<div class="col-md-4">
			<span style="background-color: white; border: 1px solid black; padding: 10px 40px;"></span>&nbsp;&nbsp;&nbsp;
			<span>Not Answered</span>
		</div>
	</div>

	<div class="mt-5 mb-5"></div>
	
    <?php $length = count($questions,COUNT_NORMAL); ?>

  	<ul class="nav nav-pills nav-justify mb-3" id="pills-tab" role="tablist" style="border: 1px solid blue; padding: 10px;">
  		<?php $i=1;?>
  		<?php foreach($questions as $question): ?>
	  		<li class="nav-item">
		    	<a class="nav-link <?php if ($i==1) echo 'active';?>" id="question<?=$i;?>-tab" data-toggle="pill" href="#question<?=$i;?>" role="tab" aria-controls="question<?=$i?>" aria-selected="<?php if ($i==1) echo 'true';?>"><?=$i?></a>
		  	</li>
	  	<?php $i++;?>
  		<?php endforeach;?>
  	</ul>

  	<div class="mt-5 mb-5"></div>
  	
    <div class="tab-content" id="pills-tabContent">
  		<?php $i=1;?>
  		<?php foreach($questions as $question): ?>
        <?php $qid; $qid=$question['id']; ?>
  		  <div class="tab-pane fade show <?php if ($i==1) echo 'active';?>" id="question<?=$i;?>" role="tabpanel" aria-labelledby="question<?=$i;?>" style="text-align: center;">
  			<span>Question <?=$i;?>.&nbsp;&nbsp; <?=$question['name'];?></span>&nbsp;&nbsp;&nbsp;
        <?php if(!$question['img']==""):?>
          <img src="<?php echo base_url()?>assets/images/questions/<?=$question['img']?>" style="height: 150px; width: 150px;">
        <?php endif;?>
        <br><br><br>

        <?php echo form_open_multipart('exam/justify');?>
          <input type="hidden" name="question[<?=$i?>]" value="<?=$qid;?>">
          <?php $j=1;?>
            <?php foreach($answers as $answer): ?>
              <?php if($answer['q_id']==$qid) :?>
                <input type="radio" name="givenanswers[<?=$i?>]" value="<?=$answer['id']?>">
                <span><?=$answer['name'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if(!$answer['img']==""):?>
                  <img src="<?php echo base_url()?>assets/images/questions/<?=$answer['img']?>" style="height: 150px; width: 150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php endif;?>
              <?php if($j%2==0) echo "<br>"; $j++;?>
            <?php endif?>
          <?php endforeach;?>

          <div class="row text-center mt-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="row">
                  <div class="col-sm-6">
                    <a 
                      class="btn btn-block btn-primary <?php if ($i==1) echo 'active disabled'?>"
                      id="<?php echo'question'.($i-1).'-tab'?>"
                      data-toggle="pill"
                      href="<?php echo '#question'.($i-1)?>"
                      role="tab"
                      aria-controls="<?php echo 'question'.($i-1)?>"
                      aria-selected="<?php if ($i==$i) echo 'true'?>">Previous</a>
                  </div>
                  <div class="col-sm-6">
                    <a 
                      class="btn btn-primary btn-block <?php if($i==$length) echo 'disabled'?>"
                      id="<?php echo 'question'.($i+1).'-tab'?>"
                      data-toggle="pill"
                      href="<?php echo '#question'.($i+1)?>"
                      role="tab"
                      aria-controls="<?php echo 'question'.($i+1)?>"
                      aria-selected="<?php if ($i==$i) echo 'true'?>">Next</a>    
                  </div>
                </div>
            </div>
            <div class="col-md-4"></div>
          </div>
  		  </div>    
    		<?php $i++;?>
    		<?php endforeach;?>
        
        <input type="hidden" name="total" value="<?=$length?>">
        <input type="hidden" name="examid" value="<?=$examid?>">
        <div class="row mt-5">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <button class="btn btn-block btn-outline-danger" type="submit">Finish Exam</button>
          </div>
          <div class="col-md-4"></div>
        </div>
      </form> 

  	</div>








</div>