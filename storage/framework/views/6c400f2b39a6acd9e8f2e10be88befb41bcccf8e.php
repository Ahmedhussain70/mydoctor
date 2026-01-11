
<?php $__env->startSection('title'); ?>
    <?php echo e(__('message.Search Hospital')); ?>

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
<style>
.clinic-block-one:hover, .team-block-three:hover {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
</style>
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
                    <h1><?php echo e(__('message.Search Hospital')); ?></h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <div class="auto-container">
                <ul class="bread-crumb clearfix">
                    <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('message.Home')); ?></a></li>
                    <li><?php echo e(__('message.Search Hospital')); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="select-field bg-color-3">
        <div class="auto-container">
            <div class="content-box">
                <div class="form-inner clearfix">
                    <form action="<?php echo e(url('searchhospital')); ?>" method="get">
                        <div class="form-group clearfix">

                            <input type="text" name="term" value="<?php echo e($term); ?>" id="term"
                                placeholder="Ex. <?php echo e(__('message.Hospital')); ?> <?php echo e(__('message.Name')); ?>" required="">
                            <?php if(request()->get('city_id')): ?>
                                <input type="hidden" name="type" value="<?php echo e(request()->get('city_id')); ?>">
                            <?php endif; ?>
                            <button type="submit"><i class="icon-Arrow-Right"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
      <section class="clinic-section doctors-page-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h3><?php echo e(__('message.Showing')); ?> <?php echo e(count($doctorlist)); ?> <?php echo e(__('message.Results')); ?></h3>
                        </div>
                        <div class="right-column pull-right clearfix">
                            <div class="short-box clearfix">
                                <div class="select-box">
                                    <div class="select-box" style="float: right;">
                                        <select class="wide" onchange="serachcity(this.value)">
                                            <option value=""><?php echo e(__('message.select')); ?> <?php echo e(__('message.city')); ?>

                                            </option>
                                            <?php $__currentLoopData = $city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->id); ?>"
                                                    <?= isset($city_id) && $city_id == $city->id ? 'selected="selected"' : '' ?>>
                                                    <?php echo e($city->city_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-box">
                                <button class="list-view"><i class="icon-List"></i></button>
                                <button class="grid-view on"><i class="icon-Grid"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper grid">
                        <div class="clinic-list-content list-item">
                            <?php $__currentLoopData = $doctorlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="clinic-block-one" data-toggle="tooltip" data-placement="top" data-html="true" title="<?php $title = ''; if($dl->reviewslist->count() > 0){ foreach($dl->reviewslist as $review){ $title .= '<div><strong>' . ($review->patientls->name ?? '') . '</strong>: ' . substr(htmlspecialchars($review->description), 0, 50) . '</div>'; } } else { $title = 'No reviews yet'; } echo $title; ?>">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-24.png')); ?>');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('<?php echo e(asset('public/front_pro/assets/images/shape/shape-25.png')); ?>');">
                                            </div>
                                        </div>
                                        <figure class="image-box">
                                            <?php if($dl->image != ''): ?>
                                                <img src="<?php echo e(asset('public/upload/doctors') . '/' . $dl->image); ?>"
                                                    alt="" style="height: 155px;">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/upload/doctors/defaultdoctor.png')); ?>"
                                                    alt="" style="height: 155px;">
                                            <?php endif; ?>

                                        </figure>
                                        <div class="content-box">
                                            <div class="like-box">
                                                <?php if($dl->is_fav == '0'): ?>
                                                    <?php if(empty(Session::has('user_id'))): ?>
                                                        <a href="<?php echo e(url('patientlogin')); ?>"
                                                            id="favdoc<?php echo e($dl->id); ?>">
                                                        <?php else: ?>
                                                            <a href="javascript:userfavorite('<?php echo e($dl->id); ?>')"
                                                                id="favdoc<?php echo e($dl->id); ?>">
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="javascript:userfavorite('<?php echo e($dl->id); ?>')"
                                                        class="activefav" id="favdoc<?php echo e($dl->id); ?>">
                                                <?php endif; ?>
                                                <i class="far fa-heart"></i></a>
                                            </div>
                                            <ul class="name-box clearfix">
                                                <li class="name">
                                                    <h3><a
                                                            href="<?php echo e(url('viewhospital') . '/' . $dl->id); ?>"><?php echo e($dl->name); ?></a>
                                                    </h3>
                                                </li>
                                                <!-- <li><i class="icon-Trust-1"></i></li>
                                                            <li><i class="icon-Trust-2"></i></li> -->
                                            </ul>
                                            <span
                                                class="designation"><?php echo e(isset($dl->departmentls) ? $dl->departmentls->name : ''); ?></span>
                                            <div class="text">
                                                <p><?php echo e(substr($dl->aboutus, 0, 200)); ?></p>
                                            </div>
                                            <div class="rating-box clearfix">
                                                <ul class="rating clearfix">
                                                    <?php
                                                    $arr = $dl->avgratting;
                                                    if (!empty($arr)) {
                                                        $i = 0;
                                                        if (isset($arr)) {
                                                            for ($i = 0; $i < $arr; $i++) {
                                                                echo '<li><i class="icon-Star"></i></li>';
                                                            }
                                                        }

                                                        $remaing = 5 - $i;
                                                        for ($j = 0; $j < $remaing; $j++) {
                                                            echo '<li class="light"><i class="icon-Star"></i></li>';
                                                        }
                                                    } else {
                                                        for ($j = 0; $j < 5; $j++) {
                                                            echo '<li class="light"><i class="icon-Star"></i></li>';
                                                        }
                                                    } ?>
                                                    <li><a
                                                            href="<?php echo e(url('viewhospital') . '/' . $dl->id); ?>">(<?php echo e($dl->totalreview); ?>)</a>
                                                    </li>
                                                </ul>
                                                <div class="link"><a
                                                        href="<?php echo e(url('viewhospital') . '/' . $dl->id); ?>"><?php echo e($dl->working_time); ?></a>
                                                </div>
                                            </div>
                                            <div class="location-box">
                                                <p><i class="fas fa-map-marker-alt"></i><?php echo e(substr($dl->address, 0, 38)); ?>

                                                </p>
                                            </div>
                                            <div class="btn-box"><a
                                                    href="<?php echo e(url('viewhospital') . '/' . $dl->id); ?>"><?php echo e(__('message.Visit Now')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($type) && $type != '' && isset($term) && $term != ''): ?>
                                <?php echo e($doctorlist->appends(['term' => $term, 'type' => $type])->links()); ?>

                            <?php elseif(isset($type) && $type != '' && empty($term)): ?>
                                <?php echo e($doctorlist->appends(['type' => $type])->links()); ?>

                            <?php elseif(isset($type) && $type != '' && empty($term)): ?>
                                <?php echo e($doctorlist->appends(['term' => $term])->links()); ?>

                            <?php else: ?>
                                <?php echo e($doctorlist->links()); ?>

                            <?php endif; ?>
                        </div>


                        <div class="clinic-grid-content">
                            <div class="row clearfix">
                                <?php $__currentLoopData = $doctorlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6 col-md-6 col-sm-12 team-block">
                                        <div class="team-block-three"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            data-bs-html="true"
                                            title="">

                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img
                                                        src="<?php echo e($dl->image
                                                            ? asset('public/upload/doctors/'.$dl->image)
                                                            : asset('public/upload/doctors/defaulthospital.jpeg')); ?>"
                                                        style="height:245px"
                                                        alt="hospital Image">

                                                    
                                                    <?php if($dl->is_fav == 0): ?>
                                                        <a href="<?php echo e(Session::has('user_id') ? 'javascript:userfavorite1('.$dl->id.')' : url('patientlogin')); ?>"
                                                        id="favdoc<?php echo e($dl->id); ?>">
                                                    <?php else: ?>
                                                        <a href="javascript:userfavorite1('<?php echo e($dl->id); ?>')"
                                                        class="activefav"
                                                        id="favdoc<?php echo e($dl->id); ?>">
                                                    <?php endif; ?>
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                </figure>

                                                <div class="lower-content">
                                                    <h3>
                                                        <a href="<?php echo e(url('viewhospital/'.$dl->id)); ?>"><?php echo e($dl->name); ?></a>
                                                    </h3>

                                                    <span class="designation">
                                                        <?php echo e($dl->departmentls->name ?? ''); ?>

                                                    </span>

                                                    
                                                    <ul class="rating clearfix d-flex justify-content-start">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                            <li class="<?php echo e($i <= $dl->avgratting ? '' : 'light'); ?>">
                                                                <i class="icon-Star"></i>
                                                            </li>
                                                        <?php endfor; ?>
                                                        <li>
                                                            <a href="<?php echo e(url('viewhospital/'.$dl->id)); ?>">
                                                                (<?php echo e($dl->totalreview); ?>)
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <p class="location mt-2">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?php echo e(Str::limit($dl->address, 38)); ?>

                                                    </p>

                                                    <div class="lower-box clearfix mt-2">
                                                        <a href="<?php echo e(url('viewhospital/'.$dl->id)); ?>">
                                                            <?php echo e(__('message.Visit Now')); ?>

                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if(isset($type) && $type != '' && isset($term) && $term != ''): ?>
                                <?php echo e($doctorlist->appends(['term' => $term, 'type' => $type])->links()); ?>

                            <?php elseif(isset($type) && $type != '' && empty($term)): ?>
                                <?php echo e($doctorlist->appends(['type' => $type])->links()); ?>

                            <?php elseif(isset($type) && $type != '' && empty($term)): ?>
                                <?php echo e($doctorlist->appends(['term' => $term])->links()); ?>

                            <?php else: ?>
                                <?php echo e($doctorlist->links()); ?>

                            <?php endif; ?>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="map-inner ml-10">

                        <div id="map" style="height: 400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script type="text/javascript">
        function serachcity(val) {
            var term = $("#term").val();
            if (term === "") {
                if (val !== "") {
                    window.location.href = '<?php echo e(url('searchhospital')); ?>' + '?city_id=' + val;
                }
            } else {

                window.location.href = '<?php echo e(url('searchhospital')); ?>' + '?city_id=' + val + '&term=' + term;

            }

        }

        function userfavorite1(id) {
            $.ajax({
                url: $("#siteurl").val() + "/userfavorite" + '/' + id,
                method: "get",
                success: function(data) {
                    var str = JSON.parse(data);
                    var txt = '<div class="col-sm-12"><div class="alert  ' + str['class'] +
                        ' alert-dismissible fade show" role="alert">' + str["msg"] +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>';
                    $("#favmsg").html(txt);
                    if (str['op'] == '1') {
                        $("#favdoc1" + id).addClass("activefav");
                    } else {
                        $("#favdoc1" + id).removeClass("activefav");
                    }
                }
            });
        }
    </script>
    <script>
    window.initMap = function () {

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: <?php echo e(config('mapdetail.lat')); ?>,
                lng: <?php echo e(config('mapdetail.long')); ?>

            },
            zoom: 12
        });

        var infoWindow = new google.maps.InfoWindow();
        var markerBounds = new google.maps.LatLngBounds();
        var markers = <?php echo json_encode($doctorslistmap, 15, 512) ?>;

        markers.forEach(function(markerElem) {
            if (markerElem.lat && markerElem.lon) {

                var point = new google.maps.LatLng(
                    parseFloat(markerElem.lat),
                    parseFloat(markerElem.lon)
                );

                markerBounds.extend(point);

                var infowincontent = `
                    <strong>${markerElem.name}</strong><br>
                    ${markerElem.address}
                `;

                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: {
                        url: "<?php echo e(asset('front_pro/assets/images/icons/map-marker.png')); ?>",
                        scaledSize: new google.maps.Size(40, 40),
                        anchor: new google.maps.Point(20, 40)
                    }
                });

                marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                });
            }
        });

        if (!markerBounds.isEmpty()) {
            map.fitBounds(markerBounds);
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mydoctor\resources\views/user/all_hospital.blade.php ENDPATH**/ ?>