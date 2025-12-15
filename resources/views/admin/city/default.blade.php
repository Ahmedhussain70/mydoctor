@extends('admin.layout')
@section('title')
    {{ __('message.city') }} | {{ __('message.Admin Dashboard') }}
@stop
@section('meta-data')
@stop
@section('content')
    <div class="container-fluid mb-4">
        <!-- end page title -->
        @if (Session::has('message'))
            <div class="col-sm-12">
                <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show"
                    role="alert">
                    <i class="uil uil-check me-2"></i>
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div>
                                <h4 class="card-title float-left">{{ __('message.city') }} {{ __('message.List') }}</h4>
                                <a href="{{ url('backend/add_city/0') }}" type="button"
                                    class="btn btn-primary waves-effect waves-light mb-3 float-right"><i
                                        class="fas fa-plus"></i>{{ __('message.Add city') }}</a>
                            </div>
                            <div class="table-responsive mb-4">
                                <table class="table table-bordered dt-responsive tablels"
                                    id="medicine" style="border-collapse: collapse; width: 100%;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 120px;">{{ __('message.Id') }} </th>
                                            <th>{{ __('message.Name') }} </th>
                                            <th style="width: 120px;">{{ __('message.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data as $data)
                                            <tr>

                                                <td><a href="javascript: void(0);"
                                                        class="text-reset  fw-bold">{{ $data->id }}</a> </td>

                                                <td>
                                                    <span>{{ $data->city_name }}</span>
                                                </td>

                                                <td>
                                                    <a href="{{ url('backend/add_city',$data->id) }}"
                                                        class="px-3 text-primary"><i class="fas fa-edit"></i></a>

                                                   @if (Session::get('is_demo') == '0')
                                                        <a href="#" onclick="disablebtn()"
                                                            class="px-3 px-3 text-danger"><i class="fas fa-trash">
                                                            </i></a>
                                                    @else
                                                        <a href="{{ url('backend/delete_city', $data->id) }}"
                                                            class="px-3 px-3 text-danger"><i class="fas fa-trash">
                                                            </i></a>
                                                    @endif
                                                </td>
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
        <!-- end row -->
    </div> <!-- container-fluid -->
@stop
