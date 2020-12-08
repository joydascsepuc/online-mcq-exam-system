<div class="container p-5">
	
	<div class="text-center">
		<?php $i=1; $rightans=0; $wrongans=0; $notanswered=0;?>
		<?php foreach($questions as $question):?>
			<?php $QuestionID = $question['id'];?>
			<?php $comment = "";?>
			<?php foreach($logs as $log):?>
				<?php
					if($log['question_id'] == $QuestionID){
						foreach($answers as $answer){
							if($answer['id'] == $log['given_ans_id']){
								if($answer['is_ans'] == 1){
									$comment = "<span style='color: green; font-size: 1.1rem;'>Right Answered</span>";
									$rightans++;
									break;
								}else{
									$comment = "<span style='color: red; font-size: 1.1rem;'>Wrong Answered</span>";
									$wrongans++;
									break;
								}
							}
						}
					}
				?>
			<?php endforeach; ?>

			<?php 

				if($comment == ""){
					$comment = "<span style='color: blue; font-size: 1.1rem;'>Not Answered</span>";
					$notanswered++;
				}

			?>


			<?php if($i!=1) echo '<br><br><br>'?>
			<?php $qid; $qid=$question['id']; ?>  
	  		<span style="font-size: 1.4rem;">Question&nbsp;<?=$i?>.&nbsp;&nbsp;<?=$question['name'];?></span>&nbsp;&nbsp;&nbsp;<?php if($question['name'] != NULL) echo $comment ;?>
	        <?php if(!$question['img']==""):?>
	          <img src="<?php echo base_url()?>assets/images/questions/<?=$question['img']?>" style="height: 150px; width: 150px;"><?php if($question['img'] != NULL) echo $comment;?>
	        <?php endif;?>
	        <br><br>

	        <?php $j=1;?>
	        <?php foreach($answers as $answer): ?>

	          	<?php if($answer['q_id']==$qid) :?>
	          		
	            	<span 
	            		style="font-size: 1.2rem;"
	            		class="<?php foreach($logs as $log): ?>
	            				<?php if($log['given_ans_id'] == $answer['id']) echo "font-weight-bolder"?>
	            				<?php if($answer['is_ans']==1):?>
	            					text-success
	            				<?php endif; ?>
	            				<?php if($log['given_ans_id'] == $answer['id'] && ($answer['is_ans']==0)): echo "font-weight-bolder text-danger"?>
	            				<?php endif;?>
	            				<?php if($log['given_ans_id'] == NULL && ($answer['is_ans']==0)):?>
	            				<?php endif;?>
	            			   <?php endforeach;?>"

	            	><?=$j?>.&nbsp;&nbsp;<?=$answer['name'];?>
	            	</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	            	
	            	<?php if(!$answer['img']==""):?>
	              		<img src="<?php echo base_url()?>assets/images/questions/<?=$answer['img']?>" style="height: 150px; width: 150px;<?php if($answer['is_ans']==1) echo 'border:2px solid green;'?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	            	<?php endif; if($j%2==0) echo '<br><br>'; $j++;?>
	          		

	          	<?php endif;?>

		        
	      	<?php endforeach;?>
	    <?php $i++;?>
		<?php endforeach;?>
	</div>

	<p class="font-weight-bold text-center text-success mt-5">Right Answer: <?=$rightans/2;?></p>
	<p class="font-weight-bold text-center text-danger">Wrong Answer: <?=$wrongans/2;?></p>
	<p class="font-weight-bold text-center" style="color: blue;">No Answer: <?=$notanswered;?></p>















</div>