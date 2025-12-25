@extends('user.layout')
@section('title')
    {{ __('message.Edit Profile') }}
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
                    <h1>{{ __('message.Edit Profile') }}</h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">{{ __('message.Home') }}</a></li>
                <li>{{ __('message.Edit Profile') }}</li>
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
                        <li><a href="{{ url('hospitalreview') }}"><i
                                    class="fas fa-star"></i>{{ __('message.Reviews') }}</a></li>
                        <li><a href="{{ url('hospitaleditprofile') }}" class="current"><i
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
                    <div class="edit-profile-form">
                        <div class="title-box">
                            <h3>{{ __('message.Edit Hospital Profile') }}</h3>
                        </div>
                        <form action="{{ url('updatehospitalprofile') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $doctordata->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.Name') }}</label>
                                        <input type="text" name="name" class="form-control" value="{{ $doctordata->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.Email') }}</label>
                                        <input type="email" name="email" class="form-control" value="{{ $doctordata->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.Phone') }}</label>
                                        <input type="text" name="phoneno" class="form-control" value="{{ $doctordata->phoneno }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.Address') }}</label>
                                        <input type="text" name="address" class="form-control" value="{{ $doctordata->address }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.Working Time') }}</label>
                                        <input type="text" name="working_time" class="form-control" value="{{ $doctordata->working_time }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.City') }}</label>
                                        <select name="city_id" class="form-control" required>
                                            <option value="">{{ __('message.Select City') }}</option>
                                            @foreach ($city as $c)
                                                <option value="{{ $c->id }}" {{ $doctordata->city_id == $c->id ? 'selected' : '' }}>{{ $c->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('message.Services') }}</label>
                                        <textarea name="services" class="form-control" rows="3">{{ $doctordata->services }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('message.About Us') }}</label>
                                        <textarea name="aboutus" class="form-control" rows="5">{{ $doctordata->aboutus }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('message.Image') }}</label>
                                        <input type="file" name="upload_image" class="form-control" accept="image/*">
                                        @if ($doctordata->image)
                                            <img src="{{ asset('public/upload/doctors') . '/' . $doctordata->image }}" alt="" style="width: 100px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="theme-btn-one">{{ __('message.Update Profile') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer')
@stop