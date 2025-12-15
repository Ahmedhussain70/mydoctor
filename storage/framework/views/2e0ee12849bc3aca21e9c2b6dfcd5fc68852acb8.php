<?php $__env->startSection('title'); ?>
    <?php echo e(__('message.Doctor Dashboard')); ?>

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
                    <h1><?php echo e(__('message.Doctor Dashboard')); ?></h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <ul class="bread-crumb clearfix">
                <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('message.Home')); ?></a></li>
                <li><?php echo e(__('message.Doctor Dashboard')); ?></li>
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
                            <img src="<?php echo e(asset('public/front_pro/assets/images/resource/profile-2.png')); ?>" alt="">
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
                        <li><a href="<?php echo e(url('doctordashboard')); ?>"><i
                                    class="fas fa-columns"></i><?php echo e(__('message.Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(url('doctorappointment')); ?>"><i
                                    class="fas fa-calendar-alt"></i><?php echo e(__('message.Appointment')); ?></a></li>
                        <li><a href="<?php echo e(url('doctortiming')); ?>"><i
                                    class="fas fa-clock"></i><?php echo e(__('message.Schedule Timing')); ?></a></li>
                        <li><a href="<?php echo e(url('doctorreview')); ?>"><i class="fas fa-star"></i><?php echo e(__('message.Reviews')); ?></a>
                        </li>
                        <li><a href="<?php echo e(url('doctor_hoilday')); ?>"><i
                                    class="fas fa-star"></i><?php echo e(__('message.My Hoilday')); ?></a></li>
                        <li><a href="<?php echo e(url('doctoreditprofile')); ?>"><i
                                    class="fas fa-user"></i><?php echo e(__('message.My Profile')); ?></a></li>
                        <li><a href="<?php echo e(url('earningreports')); ?>" class="current"><i
                                    class="fas fa-calendar-alt"></i><?php echo e(__('message.Earning Reports')); ?></a></li>
                        <li><a href="<?php echo e(url('doctorsubscription')); ?>"><i
                                    class="fas fa-rocket"></i><?php echo e(__('message.My Subscription')); ?></a></li>
                        <li><a href="<?php echo e(url('paymenthistory')); ?>"><i
                                    class="fas fa-user"></i><?php echo e(__('message.Payment History')); ?></a></li>
                        <li><a href="<?php echo e(url('doctorchangepassword')); ?>"><i
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

                    <div class="doctors-appointment">
                        <div class="title-box pb-1">
                            <h3 class="mb-3"><?php echo e(__('message.Earning Reports')); ?></h3>
                            <form action="earningreports" method="get">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-12 col-md-12 mb-3">
                                        <div class="input-group pt-3">
                                            
                                            <select name="data_filter" id="" class="form-control"
                                                onchange="showDiv('hidden_div', this)">
                                                <option value=""><?php echo e(__('message.All data')); ?></option>
                                                <option value="1"
                                                    <?php echo e(Request::get('data_filter') == '1' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.custom')); ?></option>
                                                <option value="today"
                                                    <?php echo e(Request::get('data_filter') == 'today' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.Today')); ?></option>
                                                <option value="last_week"
                                                    <?php echo e(Request::get('data_filter') == 'last_week' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.Last week')); ?></option>
                                                <option value="this_month"
                                                    <?php echo e(Request::get('data_filter') == 'this_month' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.This month')); ?></option>
                                                <option value="last_month"
                                                    <?php echo e(Request::get('data_filter') == 'last_month' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.Last month')); ?></option>
                                                <option value="this_year"
                                                    <?php echo e(Request::get('data_filter') == 'this_year' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.This year')); ?></option>
                                                <option value="last_year"
                                                    <?php echo e(Request::get('data_filter') == 'last_year' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('message.Last year')); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if(Request::get('data_filter') == '1'): ?>
                                        <div class="col-xl-6 col-lg-12 mb-3" id="hidden_div">
                                        
                                            <div class="row mt-3">
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for=""><?php echo e(__('message.Start Date')); ?>:</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="start_date" value="<?php echo e(Request::get('start_date') ?? date('y-m-d')); ?>" class="form-control">
                                                </div>
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for=""> <?php echo e(__('message.End Date')); ?> :</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="end_date" value="<?php echo e(Request::get('end_date') ?? date('y-m-d')); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    <?php else: ?>
                                        <div class="col-xl-6 col-lg-12 mb-3" id="hidden_div" style="display: none;">

                                            <div class="row mt-3">
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for=""><?php echo e(__('message.Start Date')); ?>:</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="start_date" value="<?php echo e(Request::get('start_date') ?? date('y-m-d')); ?>" class="form-control">
                                                </div>
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for=""> <?php echo e(__('message.End Date')); ?> :</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="end_date" value="<?php echo e(Request::get('end_date') ?? date('y-m-d')); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-2">
                                        <input type="submit" class="theme-btn-one"
                                            value="<?php echo e(__('message.Submit')); ?>">
                                    </div>
                                </div>
                            </form>
                            <?php $currency = explode("-", $setting->currency);?>
                            <h5 class="card-title mt-3">
                                <?php if(Request::get('data_filter')): ?>
                                    <?php if($total == null): ?>
                                        <?php echo e(__('No Earning')); ?>

                                    <?php else: ?>
                                        <?php echo e(__('Total Earning are')); ?> <?php echo e($total); ?><?php echo e($currency[1]); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                <?php echo e(__('Total Earning are')); ?> <?php echo e($total); ?><?php echo e($currency[1]); ?>

                                <?php endif; ?>
                            </h5>
                        </div>
                        <div class="doctors-list mb-5 px-5">
                            <div class="table-outer">
                                <table class="doctors-table border">

                                    <thead class="table-header" style="text-align: center;">
                                        <tr>
                                            <th><?php echo e(__('message.Patients')); ?> <?php echo e(__('message.Name')); ?></th>
                                            <th><?php echo e(__('message.Date')); ?></th>
                                            <th><?php echo e(__('message.slot')); ?></th>
                                            <th><?php echo e(__('message.consultation_fees')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php $__currentLoopData = $earningdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earningdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="padding: 10px;"><?php echo e(isset($earningdata->patientls)?$earningdata->patientls->name:""); ?></td>
                                                <td><?php echo e($earningdata->date); ?></td>
                                                <td><?php echo e($earningdata->slot_name); ?></td>
                                                <td><?php echo e($earningdata->consultation_fees); ?><?php echo e($currency[1]); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function showDiv(divId, element) {
            document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/freakd1c/public_html/demo/bookappointment/resources/views/user/doctor/earningreports.blade.php ENDPATH**/ ?>