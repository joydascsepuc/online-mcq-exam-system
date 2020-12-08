<div class="container p-5 text-center">
	<?php $i=0?>
	<?php foreach($sets as $set):?>
		<a href="<?php echo base_url()?>exam/loaddemoexam/<?=$set['id']?>" class="btn btn-outline-primary text-center" style="height: 70px; width: 250px;"><span style="vertical-align: center;"><?=$set['name'];?></span></a>
		<?php
			$i++;
			if($i%3==0) echo "<br><br><br><br>";
		?>
	<?php endforeach;?>
</div>