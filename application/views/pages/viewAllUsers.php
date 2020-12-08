<style type="text/css">
	.btn{
		padding: .010rem .25rem;
	}
</style>

<div class="container p-5">
	<table class="table text-center" id="datatable">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>E-mail</th>
				<th>Mobile</th>
				<th>Active Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1;?>
			<?php foreach($users as $user):?>
				<tr>
					<td><?=$i;?></td>
					<td><?=$user['name']?></td>
					<td><?=$user['email']?></td>
					<td><?=$user['mobile']?></td>
					<?php 
						$isActive = $user['is_active'];
						if($isActive==1){
							$status = "Active";
						}else{
							$status = "Inactive";
						}
					?>
					<td><span style="color:<?php if($isActive==0) echo 'red'; else echo 'green'; ?>"><?=$status?></span></td>
					<td>
						<a href="<?php echo base_url()?>auth/setAsDeactive/<?=$user['id']?>" class="btn btn-outline-danger <?php if($isActive==0) echo 'disabled'; ?>">Set Inactive</a>&nbsp;
						<a href="<?php echo base_url()?>auth/setAsActive/<?=$user['id']?>" class="btn btn-outline-success <?php if($isActive==1) echo 'disabled'; ?>">Set Active</a>&nbsp;
						<a href="<?php echo base_url()?>auth/resetPassword/<?=$user['id']?>" class="btn btn-outline-danger">Reset Pass</a>
					</td>
				</tr>
			<?php $i++;?>
			<?php endforeach;?>
		</tbody>
	</table>
</div>