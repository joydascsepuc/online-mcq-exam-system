<div class="container p-5">
	<div class="row mb-5">
		<div class="col-12 text-right">
			<a href="<?php echo base_url()?>students/loadAdd" class="font-weight-bold">Add Student</a>
		</div>
	</div>
	<table class="table text-center" id="datatable">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Name</th>
				<th>Force</th>
				<th>Course</th>
				<th>Programme</th>
				<th>Couse No</th>
				<th>Mobile No</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1;?>
			<?php foreach($students as $student) :?>
				<tr>
					<td><?=$i;?></td>
					<td>
						<a href="<?php echo base_url()?>students/details/<?=$student['id']?>">
							<?=$student['name']?>
						</a>
					</td>
					<td><?=$student['for_force']?></td>
					<td><?=$student['course']?></td>
					<td><?=$student['programme']?></td>
					<td><?=$student['course_no']?></td>
					<td><?=$student['mobile']?></td>
					<td>
						<a class="btn btn-default" href="<?php echo base_url()?>students/edit/<?=$student['id']?>"><i class="far fa-edit"></i>
						</a>
						<a class="btn btn-default" onclick="alert('Are you sure?')" href="<?php echo base_url()?>students/delete/<?=$student['id']?>"><i class="far fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<?$i++?>
			<?php endforeach;?>
		</tbody>
	</table>
</div>