<div class="container" style="padding: 1rem 3rem 3rem 3rem;">
  <input type="hidden" id="limit" value="<?=$time;?>">
  <div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
      <p id="demo" class="font-weight-bold" style="font-size: 1.5rem;"></p>
    </div>
    <div class="col-md-4"></div>    
  </div>


  <div class="row text-center">
    <div class="col-lg-4">
      <span style="background-color: green; border: 1px solid green;padding: 10px 40px;">Answered</span>
    </div>
    <div class="col-lg-4">
      <span style="background-color: #007BFF; border: 1px solid #007BFF; padding: 10px 40px;">Current Question</span>
    </div>
    <div class="col-lg-4">
      <span style="background-color: white; border: 1px solid black; padding: 10px 40px;">Not Answered</span>
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
        <?php echo form_open_multipart('exam/demoJustify');?>
          <input type="hidden" name="question[<?=$i?>]" value="<?=$qid;?>">
         
            <?php foreach($answers as $answer): ?>
              <?php if($answer['q_id']==$qid) :?>
                <input type="radio" name="givenanswers[<?=$i?>]" onclick="color();" value="<?=$answer['id']?>">
                <span><?=$answer['name'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if(!$answer['img']==""):?>
                  <img src="<?php echo base_url()?>assets/images/questions/<?=$answer['img']?>" style="height: 150px; width: 150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php endif; echo "<br><br>";?>
                
            <?php endif?>
      
          <?php endforeach;?>
          &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="givenanswers[<?=$i?>]" onclick="color2();" value=""><span>&nbsp;No Answer</span>
        </div> 
        <?php $i++;?>
        <?php endforeach;?>
        

      <div class="row text-center mt-5">
          <div class="col-md-2"></div>
          <div class="col-md-8">
              <div class="row">
                <div class="col-md-4">
                  <a class="btn btn-block btn-primary btnPrevious" style="color:white;">Previous</a>
                </div>
                <div class="col-md-4">
                  <a class="btn btn-primary btn-block btnNext" style="color:white;">Next</a>    
                </div>
                <div class="col-md-4">
                  <input type="hidden" name="total" value="<?=$length?>">
                  <input type="hidden" name="examid" value="<?=$examid?>">
                  <button class="btn btn-block btn-outline-danger" id="finish" type="submit">Finish</button>
                </div>
              </div>
          </div>
          <div class="col-md-4"></div>
      </div>
       



    
    
  </div>
  </div>

<script type="text/javascript">
  
  $('.btnNext').click(function(){
    $('.nav-pills > .nav-item > .active').parent().next('li').find('a').trigger('click');
  });

  $('.btnPrevious').click(function(){
    $('.nav-pills > .nav-item > .active').parent().prev('li').find('a').trigger('click');
  });

  function color(){
      $('.nav-pills > .nav-item .active').css({"background-color":"green"});
  };

  function color2(){
      $('.nav-pills > .nav-item .active').css({"color":"#007bff","background-color":"transparent"});
  };


  var limit = document.getElementById('limit').value;
  var countDownDate = new Date().getTime() + (limit*1000*60);
  
  var x = setInterval(function(){

    var now = new Date().getTime();
    var distance = countDownDate - now;

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("demo").innerHTML = hours + "&nbsp;&nbsp;&nbsp;Hour(s)&nbsp;&nbsp;&nbsp;"
    + minutes + "&nbsp;&nbsp;&nbsp;Minute(s)&nbsp;&nbsp;&nbsp;" + seconds + "&nbsp;&nbsp;&nbsp;Second(s)";
    
  
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
      $("#finish").trigger('click'); 
    }
  }, 1000);


// $(window).bind('beforeunload',function(){

//      //save info somewhere
//      e.preventDefault();
//     // return 'are you sure you want to leave?';
//     $("#finish").trigger('click'); 
// });

 window.onbeforeunload = function ()
 {
     return "Are you sure?";
 };


</script>