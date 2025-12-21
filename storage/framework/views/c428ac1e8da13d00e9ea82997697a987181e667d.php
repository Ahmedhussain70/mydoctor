
<?php $__env->startSection('title'); ?>
    <?php echo e(__('message.Hospital Doctors')); ?> | <?php echo e(__('message.Admin')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta-data'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0"><?php echo e(__('message.Doctors for')); ?> <?php echo e($hospital->name); ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('backend/hospital')); ?>"><?php echo e(__('message.Hospital')); ?></a>
                            </li>
                            <li class="breadcrumb-item active"><?php echo e(__('message.Doctors')); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5><?php echo e(__('message.Assigned Doctors')); ?></h5>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered dt-responsive tablels" id="assignedTable" style="border-collapse: collapse; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th><?php echo e(__("message.Id")); ?></th>
                                        <th><?php echo e(__("message.Image")); ?></th>
                                        <th><?php echo e(__("message.Name")); ?></th>
                                        <th><?php echo e(__("message.Email")); ?></th>
                                        <th><?php echo e(__("message.Phone")); ?></th>
                                        <th><?php echo e(__("message.Action")); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $assigned_doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($doc->id); ?></td>
                                        <td>
                                            <?php if($doc->image): ?>
                                                <img src="<?php echo e(asset('public/upload/doctors/'.$doc->image)); ?>" width="65px;" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/upload/doctors/defaultdoctor.png')); ?>" width="65px;" alt="">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($doc->name); ?></td>
                                        <td><?php echo e($doc->email); ?></td>
                                        <td><?php echo e($doc->phoneno); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('savedoctor', $doc->id)); ?>" class="px-3"><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo e(route('remove_doctor', [$hospital->id, $doc->id])); ?>" class="px-3 text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <h5><?php echo e(__('message.Add Doctor')); ?></h5>
                        <form action="<?php echo e(route('assign_doctor', $hospital->id)); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label><?php echo e(__('message.Select Doctor')); ?></label>
                                <select name="doctor_id" class="form-control" required>
                                    <option value=""><?php echo e(__('message.Select Doctor')); ?></option>
                                    <?php $__currentLoopData = $all_doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($doc->id); ?>"><?php echo e($doc->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('message.Add')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mydoctor\resources\views/admin/hospital/hospital_doctors.blade.php ENDPATH**/ ?>