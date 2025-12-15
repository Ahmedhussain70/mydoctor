<?php $__env->startSection('title'); ?>
    <?php echo e(__('message.Laboratory')); ?> <?php echo e(__('message.Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta-data'); ?>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(__('message.System Name')); ?>" />
    <meta property="og:title" content="<?php echo e(__('message.System Name')); ?>" />
    <meta property="og:image" content="<?php echo e(asset('public/image_web/') . '/' . $setting->favicon); ?>" />
    <meta property="og:image:width" content="250px" />
    <meta property="og:image:height" content="250px" />
    <meta property="og:site_name" content="<?php echo e(__('message.System Name')); ?>" />
    <meta property="og:description" content="<?php echo e(__('message.meta_description')); ?>" />
    <meta property="og:keyword" content="<?php echo e(__('message.Meta Keyword')); ?>" />
    <link rel="shortcut icon" href="<?php echo e(asset('public/image_web/') . '/' . $setting->favicon); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="page-title-two">
        <div class="title-box centred bg-color-2">
            <div class="pattern-layer">
                <div class="pattern-1"
                    style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-70.png')); ?>');">
                </div>
                <div class="pattern-2"
                    style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-71.png')); ?>');">
                </div>
            </div>
            <div class="auto-container">
                <div class="title">
                    <h1><?php echo e(__('message.Laboratory')); ?> <?php echo e(__('message.Dashboard')); ?></h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('message.Home')); ?></a></li>
                <li><?php echo e(__('message.Laboratory')); ?> <?php echo e(__('message.Dashboard')); ?></li>
            </ul>
        </div>
    </section>
    <section class="doctors-dashboard bg-color-3">
        <div class="left-panel">
            <div class="profile-box">
                <div class="upper-box">
                    <figure class="profile-image">
                        <?php if($doctordata->image != ''): ?>
                            <img src="<?php echo e(asset('public/upload/doctors') . '/' . $doctordata->image); ?>" alt="">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/upload/doctors/defaultlaboratory.png')); ?>" alt="">
                        <?php endif; ?>
                    </figure>
                    <div class="title-box centred">
                        <div class="inner">
                            <h3><?php echo e($doctordata->name); ?></h3>
                            <p><?php echo e(isset($doctordata->departmentls) ? $doctordata->departmentls->name : ''); ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-info">
                    <ul class="list clearfix">
                        <li><a href="<?php echo e(url('laboratorydashboard')); ?>" class="current"><i
                                    class="fas fa-columns"></i><?php echo e(__('message.Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(url('laboratoryreport')); ?>"><i
                                    class="fas fa-pills"></i><?php echo e(__('message.Report')); ?></a></li>
                        <li><a href="<?php echo e(url('laboratoryreview')); ?>"><i
                                    class="fas fa-star"></i><?php echo e(__('message.Reviews')); ?></a></li>
                        <li><a href="<?php echo e(url('laboratoryeditprofile')); ?>"><i
                                    class="fas fa-user"></i><?php echo e(__('message.My Profile')); ?></a></li>
                        <li><a href="<?php echo e(url('laboratorychangepassword')); ?>"><i
                                    class="fas fa-unlock-alt"></i><?php echo e(__('message.Change Password')); ?></a></li>
                        <li><a href="<?php echo e(url('logout')); ?>"><i
                                    class="fas fa-sign-out-alt"></i><?php echo e(__('message.Logout')); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="content-container">
                <div class="outer-container">
                    <div class="feature-content">
                        <div class="row clearfix">
                            <div class="col-xl-4 col-lg-12 col-md-12 feature-block">
                                <div class="feature-block-two">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-79.png')); ?>');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-80.png')); ?>');">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 feature-block">
                                <div class="feature-block-two">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-81.png')); ?>');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-82.png')); ?>');">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 feature-block">
                                <div class="feature-block-two">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-83.png')); ?>');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-84.png')); ?>');">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doctors-appointment">
                        <div class="title-box">
                            <h3><?php echo e(__('message.Order')); ?></h3>
                            <div class="btn-box">

                            </div>
                        </div>
                        <div class="doctors-list  m-3">
                            <div class="table-outer">
                                <table id="myTable">
                                    <thead class="table-header">
                                        <tr>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                                        
                                                    
                                                        
                                                    
                                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addprice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('message.Add')); ?> <?php echo e(__('message.Price')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="<?php echo e(url('addprice')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="idnew" value="">
                            <div class="form-group">
                                <label for="exampleInputPassword1"><?php echo e(__('message.Price')); ?></label>
                                <input type="text" class="form-control" id="exampleInputPrice1" name="price"
                                    placeholder="<?php echo e(__('message.Add')); ?> <?php echo e(__('message.Price')); ?>">
                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e(__('message.Submit')); ?>"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                let table = new DataTable('#myTable', {
                    order: [
                        [0, 'desc']
                    ]
                });
            });
        </script>
        <script>
            function addid(id) {
                $('#idnew').val(id);
            }
           </script>

    </section>

        <?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/freakd1c/public_html/demo/bookappointment/resources/views/user/laboratory/dashboard.blade.php ENDPATH**/ ?>