@extends('admin.layout')
@section('title')
    {{ __('message.save') }} {{ __('message.Doctors') }} | {{ __('message.Admin') }} {{ __('message.Doctors') }}
@stop
@section('meta-data')
@stop
@section('content')

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __('message.save') }} {{ __('message.Doctors') }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('backend/doctors') }}">{{ __('message.Doctors') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('message.save') }} {{ __('message.Doctors') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-xl-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="col-sm-12">
                                <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show"
                                    role="alert">{{ Session::get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <form action="{{ url('backend/updatedoctor') }}" class="needs-validation" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="doctor_id" value="{{ $id }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="mar20">
                                            <div id="uploaded_image">
                                                <div class="upload-btn-wrapper">
                                                    <button type="button" class="btn imgcatlog">
                                                        <input type="hidden" name="real_basic_img" id="real_basic_img"
                                                            value="<?= isset($data->image) ? $data->image : '' ?>" />
                                                        <?php
                                                        if (isset($data->image)) {
                                                            $path = asset('public/upload/doctors') . '/' . $data->image;
                                                        } else {
                                                            $path = asset('public/upload/profile/profile.png');
                                                        }
                                                        ?>
                                                        <img src="{{ $path }}" alt="..."
                                                            class="img-thumbnail imgsize" id="basic_img" width="350px">
                                                    </button>
                                                    <input type="hidden" name="basic_img" id="basic_img1" />
                                                    <input type="file" name="upload_image" id="upload_image" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('message.Name') }}<span
                                                class="reqfield">*</span></label>
                                        <input type="text" class="form-control"
                                            placeholder='{{ __('message.Enter Doctor Name') }}' id="name"
                                            name="name" required=""
                                            value="{{ isset($data->name) ? $data->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="department_id">{{ __('message.specialities') }}<span
                                                class="reqfield">*</span></label>
                                        <select class="form-control" name="department_id" id="department_id" required="">
                                            <option value="">
                                                {{ __('message.select') }} {{ __('message.specialities') }}
                                            </option>
                                            @foreach ($department as $d)
                                                <option value="{{ $d->id }}"
                                                    <?= isset($data->department_id) && $data->department_id == $d->id ? 'selected="selected"' : '' ?>>
                                                    {{ $d->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('message.Password') }}<span
                                                class="reqfield">*</span></label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder='{{ __('message.Enter password') }}' name="password" required="" minlength="6"
                                            value="{{ isset($data->password) ? $data->password : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneno">{{ __('message.Phone') }}<span
                                                class="reqfield">*</span></label>
                                        <input type="text" class="form-control" id="phoneno"
                                            placeholder='{{ __('message.Enter Phone') }}' name="phoneno" required=""
                                            value="{{ isset($data->phoneno) ? $data->phoneno : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">{{ __('message.Email') }}<span
                                                class="reqfield">*</span></label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder='{{ __('message.Enter Email Address') }}' name="email"
                                            required="" <?= isset($id) && $id != 0 ? 'readonly' : '' ?>
                                            value="{{ isset($data->email) ? $data->email : '' }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">{{ __('message.Working Time') }}<span
                                                class="reqfield">*</span></label>
                                        <input type="text" class="form-control" id="working_time"
                                            placeholder='{{ __('message.Enter Working Time') }}' name="working_time"
                                            required=""
                                            value="{{ isset($data->working_time) ? $data->working_time : '' }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="aboutus">{{ __('message.consultation_fees') }}<span
                                                class="reqfield">*</span></label>
                                        <input type="number" required name="consultation_fees"
                                            value="{{ isset($data->consultation_fees) ? $data->consultation_fees : '' }}"
                                            class="form-control" id="consultation_fees" min="1" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="aboutus">{{ __('message.About Us') }}<span
                                                class="reqfield">*</span></label>
                                        <textarea id="aboutus" class="form-control" rows="5" name="aboutus"
                                            placeholder='{{ __('message.Enter About Pharmacy') }}' required="">{{ isset($data->aboutus) ? $data->aboutus : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="services">{{ __('message.Services') }}<span
                                                class="reqfield">*</span></label>
                                        <textarea id="services" class="form-control" rows="5"
                                            placeholder='{{ __('message.Enter Description about Services') }}' name="services" required="">{{ isset($data->services) ? $data->services : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="healthcare">{{ __('message.Health Care') }}<span
                                                class="reqfield">*</span></label>
                                        <textarea id="healthcare" class="form-control" name
                                    ="healthcare"
                                            placeholder='{{ __('message.Enter Health Care') }}' rows="5" required="">{{ isset($data->healthcare) ? $data->healthcare : '' }}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="department_id">{{ __('message.city') }}<span
                                        class="reqfield">*</span></label>
                                <select class="form-control" name="city_id" id="city_id" required="">
                                    <option value="">
                                        {{ __('message.select') }} {{ __('message.city') }}
                                    </option>
                                    @foreach ($city as $c)
                                        <option value="{{ $c->id }}"
                                            <?= isset($data->city_id) && $data->city_id == $c->id ? 'selected="selected"' : '' ?> > {{ $c->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-12 p-0" id="addressorder">
                                <label>{{ __('message.Address') }}<span class="reqfield">*</span></label>
                                <input type="text" id="us2-address" name="address"
                                    placeholder='{{ __('message.Search Location') }}' required
                                    data-parsley-required="true" required="" />
                            </div>
                            <div class="map" id="maporder">
                                <div class="form-group">
                                    <div class="col-md-12 p-0">
                                        <div id="us2"></div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="lat" id="us2-lat"
                                value="{{ isset($data->lat) ? $data->lat : Config::get('mapdetail.lat') }}" />
                            <input type="hidden" name="lon" id="us2-lon"
                                value="{{ isset($data->lon) ? $data->lon : Config::get('mapdetail.long') }}" /> --}}

                                <div class="form-group">
                                    <label for="address_address">{{ __('message.Address') }}</label>
                                    <input type="text" id="address-input" name="address" class="form-control map-input" required value="{{ isset($data->address) ? $data->address : '' }}">
                                    <input type="hidden" name="lat" id="address-latitude" value="{{ isset($data->lat) ? $data->lat : $setting->map_lat  }}" />
                                    <input type="hidden" name="lon" id="address-longitude" value="{{ isset($data->lon) ? $data->lon :  $setting->map_long  }}" />
                                </div>
                                <div id="address-map-container" style="width:100%;height:300px; ">
                                    <div style="width: 100%; height: 70%" id="address-map"></div>
                                </div>

                            <div class="row">
                                <div class="form-group">
                                    @if (Session::get('is_demo') == '0')
                                        <button type="button" onclick="disablebtn()"
                                            class="btn btn-primary">{{ __('message.Submit') }}</button>
                                    @else
                                        <button class="btn btn-primary" type="submit"
                                            value="Submit">{{ __('message.Submit') }}</button>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $setting->map_api_key }}&libraries=places&callback=initialize"
        async defer></script>
        <script>
            function initialize() {
                // Prevent form submission on Enter key in map input fields
                $('form').on('keyup keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode === 13) {
                        e.preventDefault();
                        return false;
                    }
                });

                const locationInputs = document.getElementsByClassName("map-input");
                const autocompletes = [];
                const geocoder = new google.maps.Geocoder;

                for (let i = 0; i < locationInputs.length; i++) {
                    const input = locationInputs[i];
                    const fieldKey = input.id.replace("-input", "");
                    const isEdit = document.getElementById(fieldKey + "-latitude").value !== '' &&
                                   document.getElementById(fieldKey + "-longitude").value !== '';

                    const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
                    const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

                    const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                        center: { lat: latitude, lng: longitude },
                        zoom: 13
                    });

                    // Make the marker draggable
                    const marker = new google.maps.Marker({
                        map: map,
                        position: { lat: latitude, lng: longitude },
                        draggable: true
                    });

                    marker.setVisible(isEdit);

                    const autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.key = fieldKey;
                    autocompletes.push({ input, map, marker, autocomplete });

                    // Update address and coordinates on marker drag
                    google.maps.event.addListener(marker, 'dragend', function() {
                        const position = marker.getPosition();
                        updateAddress(position, geocoder, fieldKey);
                    });
                }

                // Autocomplete place change listener
                for (let i = 0; i < autocompletes.length; i++) {
                    const { input, autocomplete, map, marker } = autocompletes[i];

                    google.maps.event.addListener(autocomplete, 'place_changed', function() {
                        marker.setVisible(false);
                        const place = autocomplete.getPlace();

                        if (!place.geometry) {
                            alert("No details available for input: '" + place.name + "'");
                            input.value = "";
                            return;
                        }

                        const lat = place.geometry.location.lat();
                        const lng = place.geometry.location.lng();
                        setLocationCoordinates(autocomplete.key, lat, lng);

                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);
                        }
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);
                    });
                }
            }

            // Reverse-geocode coordinates and update the address input
            function updateAddress(position, geocoder, fieldKey) {
                geocoder.geocode({ 'location': position }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            document.getElementById(fieldKey + '-input').value = results[0].formatted_address;
                            setLocationCoordinates(fieldKey, position.lat(), position.lng());
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
                });
            }

            // Set latitude and longitude in hidden fields
            function setLocationCoordinates(key, lat, lng) {
                document.getElementById(key + "-latitude").value = lat;
                document.getElementById(key + "-longitude").value = lng;
            }
        </script>
@stop
