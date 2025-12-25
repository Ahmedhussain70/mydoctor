@extends('user.layout')
@section('title')
    {{ __('message.Reviews') }}
@stop
@section('meta-data')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ __('message.System Name') }}" />
    <meta property="og:title" content="{{ __('message.System Name') }}" />
    <meta property="og:image" content="{{ asset('public/image_web/') . '/' . $setting->favicon }}" />
    <meta property="og:image:width" content="250px" />
    <meta property="og:image:height" content="250px" />
    <meta property="og:site_name" content="{{ __('message.System Name') }}" />
    <meta property="og:description" content="{{ __('message.meta_description') }}" />
    <meta property="og:keyword" content="{{ __('message.Meta Keyword') }}" />
    <link rel="shortcut icon" href="{{ asset('public/image_web/') . '/' . $setting->favicon }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop
@section('content')
    <section class="page-title-two">
        <div class="title-box centred bg-color-2">
            <div class="pattern-layer">
                <div class="pattern-1"
                    style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-70.png') }}');">
                </div>
                <div class="pattern-2"
                    style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-71.png') }}');">
                </div>
            </div>
            <div class="auto-container">
                <div class="title">
                    <h1>{{ __('message.Reviews') }}</h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">{{ __('message.Home') }}</a></li>
                <li>{{ __('message.Reviews') }}</li>
            </ul>
        </div>
    </section>
    <section class="doctors-dashboard bg-color-3">
        <div class="left-panel">
            <div class="profile-box">
                <div class="upper-box">
                    <figure class="profile-image">
                        @if ($doctordata->image != '')
                            <img src="{{ asset('public/upload/doctors') . '/' . $doctordata->image }}" alt="">
                        @else
                            <img src="{{ asset('public/upload/doctors/defaultdoctor.png') }}" alt="">
                        @endif
                    </figure>
                    <div class="title-box centred">
                        <div class="inner">
                            <h3>{{ $doctordata->name }}</h3>
                            <p>{{ isset($doctordata->departmentls) ? $doctordata->departmentls->name : '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="profile-info">
                    <ul class="list clearfix">
                        <li><a href="{{ url('hospitaldashboard') }}"><i
                                    class="fas fa-columns"></i>{{ __('message.Dashboard') }}</a></li>
                        <li><a href="{{ url('hospitalreport') }}"><i
                                    class="fas fa-pills"></i>{{ __('message.Report') }}</a></li>
                        <li><a href="{{ url('hospitalreview') }}" class="current"><i
                                    class="fas fa-star"></i>{{ __('message.Reviews') }}</a></li>
                        <li><a href="{{ url('hospitaleditprofile') }}"><i
                                    class="fas fa-user"></i>{{ __('message.My Profile') }}</a></li>
                        <li><a href="{{ url('hospitalchangepassword') }}"><i
                                    class="fas fa-unlock-alt"></i>{{ __('message.Change Password') }}</a></li>
                        <li><a href="{{ url('logout') }}"><i
                                    class="fas fa-sign-out-alt"></i>{{ __('message.Logout') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="content-container">
                <div class="outer-container">
                    <div class="reviews-list">
                        <div class="title-box">
                            <h3>{{ __('message.All Reviews') }}</h3>
                        </div>
                        <div class="review-items">
                            @forelse ($reviewdata as $review)
                                <div class="single-review-box mb-3 p-3 border rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6>{{ isset($review->patientls) ? $review->patientls->name : '' }}</h6>
                                        <small>{{ date('F d, Y', strtotime($review->created_at)) }}</small>
                                    </div>
                                    <ul class="rating mb-2">
                                        <?php
                                        $arr = $review->rating;
                                        if (!empty($arr)) {
                                            $i = 0;
                                            for ($i = 0; $i < $arr; $i++) {
                                                echo '<li><i class="icon-Star"></i></li>';
                                            }
                                            $remaing = 5 - $i;
                                            for ($j = 0; $j < $remaing; $j++) {
                                                echo '<li class="light"><i class="icon-Star"></i></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                    <p>{{ $review->description }}</p>
                                </div>
                            @empty
                                <p>{{ __('message.No reviews yet') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer')
@stop