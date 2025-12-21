@extends('admin.layout')
@section('title')
    {{ __('message.Hospital Doctors') }} | {{ __('message.Admin') }}
@stop
@section('meta-data')
@stop
@section('content')

    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __('message.Doctors for') }} {{ $hospital->name }}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('backend/hospital') }}">{{ __('message.Hospital') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('message.Doctors') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ __('message.Assigned Doctors') }}</h5>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered dt-responsive tablels" id="assignedTable" style="border-collapse: collapse; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>{{__("message.Id")}}</th>
                                        <th>{{__("message.Image")}}</th>
                                        <th>{{__("message.Name")}}</th>
                                        <th>{{__("message.Email")}}</th>
                                        <th>{{__("message.Phone")}}</th>
                                        <th>{{__("message.Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assigned_doctors as $doc)
                                    <tr>
                                        <td>{{$doc->id}}</td>
                                        <td>
                                            @if($doc->image)
                                                <img src="{{asset('public/upload/doctors/'.$doc->image)}}" width="65px;" alt="">
                                            @else
                                                <img src="{{asset('public/upload/doctors/defaultdoctor.png')}}" width="65px;" alt="">
                                            @endif
                                        </td>
                                        <td>{{$doc->name}}</td>
                                        <td>{{$doc->email}}</td>
                                        <td>{{$doc->phoneno}}</td>
                                        <td>
                                            <a href="{{route('savedoctor', $doc->id)}}" class="px-3"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('remove_doctor', [$hospital->id, $doc->id])}}" class="px-3 text-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h5>{{ __('message.Add Doctor') }}</h5>
                        <form action="{{route('assign_doctor', $hospital->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ __('message.Select Doctor') }}</label>
                                <select name="doctor_id" class="form-control" required>
                                    <option value="">{{ __('message.Select Doctor') }}</option>
                                    @foreach ($all_doctors as $doc)
                                        <option value="{{ $doc->id }}">{{ $doc->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('message.Add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop