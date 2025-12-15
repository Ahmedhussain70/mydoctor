  @extends('user.layout')
  @section('title')
      {{ __('message.My Subscription') }}
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
      <style>
          .boxed label {
              display: inline-block;
              width: 200px;
              padding: 10px;
              border: solid 2px #ccc;
              transition: all 0.3s;
          }

          .boxed input[type="radio"] {
              display: none;
          }

          .boxed input[type="radio"]:checked+label {
              border: solid 2px green;
          }
      </style>
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
                      <h1>{{ __('message.My Subscription') }}</h1>
                  </div>
              </div>
          </div>
          <div class="lower-content">
              <ul class="bread-crumb clearfix">
                  <li><a href="{{ url('/') }}">{{ __('message.Home') }}</a></li>
                  <li>{{ __('message.My Subscription') }}</li>
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
                                      <li><a href="{{ url('earningreports') }}" ><i class="fas fa-calendar-alt"></i>{{ __('message.Earning Reports') }}</a></li>
                          <li><a href="{{ url('paymenthistory') }}"><i
                                      class="fas fa-user"></i>{{ __('message.Payment History') }}</a></li>
                          <li><a href="{{ url('mysubscription') }}" class="current"><i
                                      class="fas fa-rocket"></i>{{ __('message.My Subscription') }}</a></li>
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
                      <div class="add-listing change-password">
                          <div class="single-box">
                              <div class="title-box">
                                  <h3>{{ __('message.My Subscription') }}</h3>
                              </div>
                              <div class="inner-box">
                                  @if (Session::has('message'))
                                      <div class="col-sm-12">
                                          <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show"
                                              role="alert">
                                              {{ Session::get('message') }}
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                      </div>
                                  @endif
                                  <div class="row g-2">
                                      @foreach ($mysubscriptionlist as $index => $mysubscriptionlist)
                                          <div class="col-4 p-4">
                                              <div class="row justify-content-between"
                                                  style="background-color: #f3eae2;border-radius: 10px;">
                                                  <div class="col-9 my-3">
                                                      <h4>{{ __('message.Plan Details') }}</h4>
                                                      <b>${{ $mysubscriptionlist->amount }}/{{ $mysubscriptionlist->subscription_id }}
                                                          {{ __('message.month') }} </b></br>

                                                      <span><i class="far fa-calendar-alt"></i>
                                                          {{ \Carbon\Carbon::parse($mysubscriptionlist->date)->format('Y-m-d') }}</span><br>
                                                      </b>{{ __('message.Payment Type') }} : </b>
                                                      @if ($mysubscriptionlist->payment_type == 1)
                                                          {{ __('message.Braintree') }}
                                                      @elseif ($mysubscriptionlist->payment_type == 2)
                                                          {{ __('message.Bank Deposit') }}
                                                      @elseif($mysubscriptionlist->payment_type == 3)
                                                          {{ __('message.Razorpay') }}
                                                      @elseif($mysubscriptionlist->payment_type == 4)
                                                          {{ __('message.Paystack') }}
                                                      @elseif($mysubscriptionlist->payment_type == 5)
                                                          {{ __('message.Stripe') }}
                                                      @endif
                                                      </br>
                                                  </div>
                                                  <div class="col-3  mt-4">
                                                      <span>
                                                          @if ($index == 0)
                                                              @if ($mysubscriptionlist->status == '1')
                                                                  <span style="padding: 5px;border-radius: 5px;"
                                                                      class="btn btn-warning">{{ __('message.Not Active') }}</span>
                                                              @elseif($mysubscriptionlist->status == '2')
                                                                  <span style="padding: 5px;border-radius: 5px;"
                                                                      class="btn btn-success">{{ __('message.Active') }}</span>
                                                              @else
                                                                  <span style="padding: 5px;border-radius: 5px;"
                                                                      class="btn btn-danger">{{ __('message.Expired') }}</span>
                                                              @endif
                                                          @else
                                                          <span style="padding: 5px;border-radius: 5px;"
                                                          class="btn btn-danger">{{ __('message.Expired') }}</span>
                                                          @endif

                                                      </span>
                                                  </div>
                                              </div>

                                          </div>
                                      @endforeach
                                  </div>
                              </div>
                          </div>

                          <div class="single-box add_css" style="display:none; margin-top:20xp;">
                              <div class="title-box">
                                  <h3>{{ __('message.Subscription List') }}</h3>
                              </div>
                              <div class="inner-box">
                                  @if (Session::has('message'))
                                      <div class="col-sm-12">
                                          <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show"
                                              role="alert">
                                              {{ Session::get('message') }}
                                              <button type="button" class="close" data-dismiss="alert"
                                                  aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                      </div>
                                  @endif


                              </div>

                          </div>
                      </div>

                  </div>
              </div>
          </div>
          </div>
      </section>


  @stop
  @section('footer')
  @stop
