<div class="container p-5">
	<table class="table text-center" id="datatable">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>E-mail</th>
				<th>Mobile</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1;?>
			<?php foreach($pendings as $pending):?>
				<tr>
					<td><?=$i;?></td>
					<td><?=$pending['name']?></td>
					<td><?=$pending['email']?></td>
					<td><?=$pending['mobile']?></td>
					<td>
						<a href="<?php echo base_url()?>auth/addAsUser/<?=$pending['id']?>" class="btn btn-success">Accept</a>
						<a href="<?php echo base_url()?>auth/deleteRequest/<?=$pending['id']?>" class="btn btn-danger">Reject</a>
					</td>
				</tr>
			<?php $i++;?>
			<?php endforeach;?>
		</tbody>
	</table>
</div>