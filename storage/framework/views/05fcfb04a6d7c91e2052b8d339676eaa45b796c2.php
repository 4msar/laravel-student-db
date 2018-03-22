<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Student
                    <strong style="font-size: 2em;"> @ <?php echo e($student->name); ?></strong>
                    <a class="btn btn-secondary btn-sm float-right nav-link" href="<?php echo e(route('viewStudents', $student->id)); ?>/">View</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('updateStudent', $student->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name" name="full_name" value="<?php echo e($student->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="roll">Student Roll No</label>
                            <input type="number" class="form-control" id="roll" placeholder="Roll Number" name="roll_num" value="<?php echo e($student->roll); ?>">
                        </div>
                        <div class="form-group">
                            <label for="reg">Student Registration No</label>
                            <input type="number" class="form-control" id="reg" placeholder="Registration Number" name="reg_num" value="<?php echo e($student->registration); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo e($student->email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile No</label>
                            <input type="text" class="form-control" id="phone" placeholder="Mobile Number" name="mobile" value="<?php echo e($student->phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <select name="religion" id="religion" class="form-control">
                                <option value="Islam" <?php echo e(old('religion', $student->religion)=='Islam' ? "selected ='selected'" : ''); ?>>Islam</option>
                                <option value="Hindu" <?php echo e(old('religion', $student->religion)=='Hindu' ? "selected ='selected'" : ''); ?>>Hindu</option>
                                <option value="Christ" <?php echo e(old('religion', $student->religion)=='Christ' ? "selected ='selected'" : ''); ?>>Christ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birth">BirthDate</label>
                            <input type="date" class="form-control" id="birth" placeholder="BirthDate" name="birth" value="<?php echo e($student->birthdate); ?>">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male" <?php echo e(old('gender', $student->gender)=='Male' ? "selected ='selected'" : ''); ?>>Male</option>
                                <option value="Female" <?php echo e(old('gender', $student->gender)=='Female' ? "selected ='selected'" : ''); ?>>Female</option>
                                <option value="Other" <?php echo e(old('gender', $student->gender)=='Other' ? "selected ='selected'" : ''); ?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="blood">Blood Group</label>
                            <select name="blood" class="form-control selectpicker" id="blood">
                                <option value="A+"<?php echo e(old('blood', $student->blood_group)=='A+' ? "selected ='selected'" : ''); ?> >A(+)</option>
                                <option value="A-"<?php echo e(old('blood', $student->blood_group)=='A-' ? "selected ='selected'" : ''); ?> >A(-)</option>
                                <option value="AB+"<?php echo e(old('blood', $student->blood_group)=='AB+' ? "selected ='selected'" : ''); ?> >AB(+)</option>
                                <option value="AB-"<?php echo e(old('blood', $student->blood_group)=='AB-' ? "selected ='selected'" : ''); ?> >AB(-)</option>
                                <option value="B+"<?php echo e(old('blood', $student->blood_group)=='B+' ? "selected ='selected'" : ''); ?> >B(+)</option>
                                <option value="B-"<?php echo e(old('blood', $student->blood_group)=='B-' ? "selected ='selected'" : ''); ?> >B(-)</option>
                                <option value="O+"<?php echo e(old('blood', $student->blood_group)=='O+' ? "selected ='selected'" : ''); ?> >O(+)</option>
                                <option value="O-"<?php echo e(old('blood', $student->blood_group)=='O-' ? "selected ='selected'" : ''); ?> >O(-)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo e($student->address); ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>