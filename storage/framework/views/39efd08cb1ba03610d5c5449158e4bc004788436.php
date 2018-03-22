<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="card">
                <div class="card-header">Information of <strong style="font-size: 2em;"> @ <?php echo e($student->name); ?></strong>
                	<a class="btn btn-info btn-sm float-right nav-link" href="<?php echo e(route('students')); ?>/">Back</a>
                </div>
                <div class="card-body">
					<div class="table-striped table-responsive">
						<table class="table">
							<thead>
								<tr>
									<td><strong>Name</strong></td>
									<td><strong><?php echo e($student->name); ?></strong></td>
								</tr>
							</thead>
						<tbody>
								<tr>
									<td>Roll</td>
									<td><?php echo e($student->roll); ?></td>
								</tr>
								<tr>
									<td>Registration</td>
									<td><?php echo e($student->registration); ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo e($student->email); ?></td>
								</tr>
								<tr>
									<td>Phone Number</td>
									<td><?php echo e($student->phone); ?></td>
								</tr>
								<tr>
									<td>Religion</td>
									<td><?php echo e($student->religion); ?></td>
								</tr>
								<tr>
									<td>BirthDate</td>
									<td><?php echo e($student->birthdate); ?></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td><?php echo e($student->gender); ?></td>
								</tr>
								<tr>
									<td>Blood Group</td>
									<td><?php echo e($student->blood_group); ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><?php echo e($student->address); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php if(Auth::user()->id == $student->user_id): ?>
					<div class="card-footer">
						<a class="btn btn-secondary btn-sm float-right nav-link" href="<?php echo e(route('editStudents', $student->id)); ?>/">Edit</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>