@extends('user.layout')
@section('title')
    {{ __('message.Doctor Dashboard') }}
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
                    <h1>{{ __('message.Doctor Dashboard') }}</h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">{{ __('message.Home') }}</a></li>
                <li>{{ __('message.Doctor Dashboard') }}</li>
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
                            <img src="{{ asset('public/front_pro/assets/images/resource/profile-2.png') }}" alt="">
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
                        <li><a href="{{ url('doctordashboard') }}"><i
                                    class="fas fa-columns"></i>{{ __('message.Dashboard') }}</a></li>
                        <li><a href="{{ url('doctorappointment') }}"><i
                                    class="fas fa-calendar-alt"></i>{{ __('message.Appointment') }}</a></li>
                        <li><a href="{{ url('doctortiming') }}"><i
                                    class="fas fa-clock"></i>{{ __('message.Schedule Timing') }}</a></li>
                        <li><a href="{{ url('doctorreview') }}"><i class="fas fa-star"></i>{{ __('message.Reviews') }}</a>
                        </li>
                        <li><a href="{{ url('doctor_hoilday') }}"><i
                                    class="fas fa-star"></i>{{ __('message.My Hoilday') }}</a></li>
                        <li><a href="{{ url('doctoreditprofile') }}"><i
                                    class="fas fa-user"></i>{{ __('message.My Profile') }}</a></li>
                        <li><a href="{{ url('earningreports') }}" class="current"><i
                                    class="fas fa-calendar-alt"></i>{{ __('message.Earning Reports') }}</a></li>
                        <li><a href="{{ url('doctorsubscription') }}"><i
                                    class="fas fa-rocket"></i>{{ __('message.My Subscription') }}</a></li>
                        <li><a href="{{ url('paymenthistory') }}"><i
                                    class="fas fa-user"></i>{{ __('message.Payment History') }}</a></li>
                        <li><a href="{{ url('doctorchangepassword') }}"><i
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

                    <div class="doctors-appointment">
                        <div class="title-box pb-1">
                            <h3 class="mb-3">{{ __('message.Earning Reports') }}</h3>
                            <form action="earningreports" method="get">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-12 col-md-12 mb-3">
                                        <div class="input-group pt-3">
                                            {{-- <label for="" class="mt-2">{{ __('message.Report') }} : </label> --}}
                                            <select name="data_filter" id="" class="form-control"
                                                onchange="showDiv('hidden_div', this)">
                                                <option value="">{{ __('message.All data') }}</option>
                                                <option value="1"
                                                    {{ Request::get('data_filter') == '1' ? 'selected' : '' }}>
                                                    {{ __('message.custom') }}</option>
                                                <option value="today"
                                                    {{ Request::get('data_filter') == 'today' ? 'selected' : '' }}>
                                                    {{ __('message.Today') }}</option>
                                                <option value="last_week"
                                                    {{ Request::get('data_filter') == 'last_week' ? 'selected' : '' }}>
                                                    {{ __('message.Last week') }}</option>
                                                <option value="this_month"
                                                    {{ Request::get('data_filter') == 'this_month' ? 'selected' : '' }}>
                                                    {{ __('message.This month') }}</option>
                                                <option value="last_month"
                                                    {{ Request::get('data_filter') == 'last_month' ? 'selected' : '' }}>
                                                    {{ __('message.Last month') }}</option>
                                                <option value="this_year"
                                                    {{ Request::get('data_filter') == 'this_year' ? 'selected' : '' }}>
                                                    {{ __('message.This year') }}</option>
                                                <option value="last_year"
                                                    {{ Request::get('data_filter') == 'last_year' ? 'selected' : '' }}>
                                                    {{ __('message.Last year') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if (Request::get('data_filter') == '1')
                                        <div class="col-xl-6 col-lg-12 mb-3" id="hidden_div">
                                        
                                            <div class="row mt-3">
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for="">{{ __('message.Start Date') }}:</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="start_date" value="{{ Request::get('start_date') ?? date('y-m-d') }}" class="form-control">
                                                </div>
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for=""> {{ __('message.End Date') }} :</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="end_date" value="{{ Request::get('end_date') ?? date('y-m-d') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    @else
                                        <div class="col-xl-6 col-lg-12 mb-3" id="hidden_div" style="display: none;">

                                            <div class="row mt-3">
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for="">{{ __('message.Start Date') }}:</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="start_date" value="{{ Request::get('start_date') ?? date('y-m-d') }}" class="form-control">
                                                </div>
                                                <div class="col-xl-2 col-lg-12" id="hidden_div">
                                                    <label for=""> {{ __('message.End Date') }} :</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-12" id="hidden_div">
                                                    <input type="date" name="end_date" value="{{ Request::get('end_date') ?? date('y-m-d') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-2">
                                        <input type="submit" class="theme-btn-one"
                                            value="{{ __('message.Submit') }}">
                                    </div>
                                </div>
                            </form>
                            <?php $currency = explode("-", $setting->currency);?>
                            <h5 class="card-title mt-3">
                                @if (Request::get('data_filter'))
                                    @if ($total == null)
                                        {{ __('No Earning') }}
                                    @else
                                        {{ __('Total Earning are') }} {{ $total }}{{ $currency[1]}}
                                    @endif
                                @else
                                {{ __('Total Earning are') }} {{ $total }}{{ $currency[1]}}
                                @endif
                            </h5>
                        </div>
                        <div class="doctors-list mb-5 px-5">
                            <div class="table-outer">
                                <table class="doctors-table border">

                                    <thead class="table-header" style="text-align: center;">
                                        <tr>
                                            <th>{{ __('message.Patients') }} {{ __('message.Name') }}</th>
                                            <th>{{ __('message.Date') }}</th>
                                            <th>{{ __('message.slot') }}</th>
                                            <th>{{ __('message.consultation_fees') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        @foreach ($earningdata as $earningdata)
                                            <tr>
                                                <td style="padding: 10px;">{{ isset($earningdata->patientls)?$earningdata->patientls->name:""; }}</td>
                                                <td>{{ $earningdata->date }}</td>
                                                <td>{{ $earningdata->slot_name }}</td>
                                                <td>{{ $earningdata->consultation_fees }}{{ $currency[1]}}</td>
                                            </tr>
                                        @endforeach
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
@stop
@section('footer')
@stop
