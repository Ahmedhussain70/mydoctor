@extends('user.layout')
@section('title')
    {{ __('message.Hospital') }} {{ __('message.Dashboard') }}
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
                    <h1>{{ __('message.Hospital') }} {{ __('message.Dashboard') }}</h1>
                </div>
            </div>
        </div>
        <div class="lower-content">
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">{{ __('message.Home') }}</a></li>
                <li>{{ __('message.Hospital') }} {{ __('message.Dashboard') }}</li>
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
                        <li><a href="{{ url('hospitaldashboard') }}" class="current"><i
                                    class="fas fa-columns"></i>{{ __('message.Dashboard') }}</a></li>
                        <li><a href="{{ url('hospitalreport') }}"><i
                                    class="fas fa-pills"></i>{{ __('message.Report') }}</a></li>
                        <li><a href="{{ url('hospitalreview') }}"><i
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
                    <div class="feature-content">
                        <div class="row clearfix">
                            <div class="col-xl-4 col-lg-12 col-md-12 feature-block">
                                <div class="feature-block-two">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-79.png') }}');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-80.png') }}');">
                                            </div>
                                        </div>
                                        <div class="icon-box"><i class="icon-Dashboard-1"></i></div>
                                        <h3>{{ count($orderdata) }}</h3>
                                        <h5>{{ __('message.Total Order') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 feature-block">
                                <div class="feature-block-two">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-81.png') }}');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-82.png') }}');">
                                            </div>
                                        </div>
                                        <div class="icon-box"><i class="icon-Dashboard-5"></i></div>
                                        <h3>{{ $totalreview }}</h3>
                                        <h5>{{ __('message.Total Review') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12 col-md-12 feature-block">
                                <div class="feature-block-two">
                                    <div class="inner-box">
                                        <div class="pattern">
                                            <div class="pattern-1"
                                                style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-83.png') }}');">
                                            </div>
                                            <div class="pattern-2"
                                                style="background-image: url('{{ asset('public/front_pro/assets/images/shape/shape-84.png') }}');">
                                            </div>
                                        </div>
                                        <div class="icon-box"><i class="icon-Dashboard-3"></i></div>
                                        <h3>{{ $today }}</h3>
                                        <h5>{{ __('message.New Order') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="profile-details mb-4">
                        <div class="title-box">
                            <h3>{{ __('message.Hospital Profile') }}</h3>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p><strong>{{ __('message.Address') }}:</strong> {{ $doctordata->address }}</p>
                                <p><strong>{{ __('message.Phone') }}:</strong> {{ $doctordata->phoneno }}</p>
                                <p><strong>{{ __('message.Email') }}:</strong> {{ $doctordata->email }}</p>
                                <p><strong>{{ __('message.Working Time') }}:</strong> {{ $doctordata->working_time }}</p>
                                <p><strong>{{ __('message.Services') }}:</strong> {{ $doctordata->services }}</p>
                                <p><strong>{{ __('message.About Us') }}:</strong> {{ substr($doctordata->aboutus, 0, 100) }}...</p>
                            </div>
                        </div>
                    </div>
                    <div class="reviews-section mb-4">
                        <div class="title-box">
                            <h3>{{ __('message.Latest Reviews') }} ({{ $totalreview }})</h3>
                            <div class="btn-box">
                                <a href="{{ url('hospitalreview') }}" class="theme-btn-one">{{ __('message.View All') }}</a>
                            </div>
                        </div>
                        <div class="review-list">
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
                    </div> -->
                    <div class="doctors-appointment">
                        <div class="title-box">
                            <h3>{{ __('message.Order') }}</h3>
                            <div class="btn-box">

                            </div>
                        </div>
                        <div class="doctors-list  m-3">
                            <div class="table-outer">
                                <table id="myTable">
                                    <thead class="table-header">
                                        <tr>
                                            {{-- <th>{{ __('message.Id') }}</th>
                                            <th>{{ __('message.Patients') }} {{ __('message.Name') }}</th>
                                            <th>{{ __('message.Phone') }}</th>
                                            <th>{{ __('message.Order') }} {{ __('message.Type') }}</th>
                                            <th>{{ __('message.Total') }}</th>
                                            <th>{{ __('message.date') }}</th>
                                            <th>{{ __('message.More') }}</th>
                                            <th>{{ __('message.Status') }}</th>
                                            <th>{{ __('message.Action') }}</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($orderdata as $bdata)
                                            <tr>


                                                <td> --}}

                                                    {{-- <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '1') }}"
                                                        class="btn btn-success">{{ __('message.Accept') }}</a>
                                                    <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '2') }}"
                                                        class="btn btn-danger">{{ __('message.Reject') }}</a>
                                                @elseif ($bdata->status == '4')
                                                    <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '7') }}"
                                                        class="btn btn-primary">{{ __('message.Prepared') }}</a>
                                                @elseif ($bdata->status == '1' && $bdata->order_type == '2')
                                                    <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '7') }}"
                                                        class="btn btn-primary">{{ __('message.Prepared') }}</a>
                                                @elseif ($bdata->status == '7')
                                                    <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '8') }}"
                                                        class="btn btn-primary">{{ __('message.Out for Delivery') }}</a>
                                                @elseif ($bdata->status == '8')
                                                    <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '3') }}"
                                                        class="btn btn-success">{{ __('message.Completed') }}</a> --}}
                                                {{-- @elseif ($bdata->status == '1' && $bdata->order_type == '1') --}}
                                                    {{-- <a href="{{ url('pharmacyorderchangestatus/' . $bdata->id . '/' . '1') }}"
                                                        onclick="addid({{ $bdata->id }})" class="btn btn-warning"
                                                        style="color: white;" data-toggle="modal"
                                                        data-target="#addprice">{{ __('message.Add') }}
                                                        {{ __('message.Price') }}</a> --}}
                                                {{-- @endif --}}
                                            {{-- </td>
                                        </tr>
                                    @endforeach --}}
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.Add') }} {{ __('message.Price') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ url('addprice') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="idnew" value="">
                            <div class="form-group">
                                <label for="exampleInputPassword1">{{ __('message.Price') }}</label>
                                <input type="text" class="form-control" id="exampleInputPrice1" name="price"
                                    placeholder="{{ __('message.Add') }} {{ __('message.Price') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('message.Submit') }}</button>
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

        @stop
@section('footer')
@stop