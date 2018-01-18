
@extends('layouts/default') 
{{-- Page title --}} 
@section('title') 
{{ $title }} 
@stop {{-- local styles --}} 
@section('header_styles') 
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/css/select2.min.css')}}">
<link href="{{asset('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('vendors/daterangepicker/css/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{asset('vendors/datedropper/datedropper.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/timedropper/css/timedropper.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/jquerydaterangepicker/css/daterangepicker.min.css')}}">
<!--clock face css-->
<link rel="stylesheet" type="text/css" href="{{asset('vendors/clockpicker/css/bootstrap-clockpicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/datepicker.css')}}">

@stop 
{{-- Page Header--}} 
@section('page-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('taskManagementProjectIndex') }}">
                <i class="fa ti-arrow-circle-left"></i> Back
            </a>
        </li>
    </ol>
</section>
@stop {{-- Page content --}} 

@section('content') 

<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        <ul style="padding:0;">
            <li>{{ session()->get('message') }}</li>
        </ul>
    </div>
@endif
</div>   

<div class="row">    
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-pencil"></i> Form edit project
                </h3>
                <span class="pull-right">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                {{--  <form action="#" class="form-horizontal">  --}}
                {!! Form::open(['route' => ['taskManagementProjectUpdate',$project->id],'method' => 'post','class' => 'form-horizontal']) !!}  
                    <div class="form-body">                        
                        <div class="form-group m-t-10">
                            <label for="inputUsername1" class="col-sm-3 control-label">
                                Staf
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-user"></i>
                                    </span>
                                    <select id="staf" name="staf_id" class="form-control">
                                        <option value="" selected disabled>-Select Staf-</option>
                                        @foreach($stafs as $staf)
                                            <option value="{{ $staf->id }}" @if($project->staf_id == $staf->id) selected @endif>{{ $staf->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-t-10">
                            <label for="inputUsername1" class="col-sm-3 control-label">
                                Project Name
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw ti-ruler-pencil"></i>
                                    </span>
                                    <input type="text" name="name" value="{{ $project->name }}" class="form-control" id="inputUsername2" placeholder="Project Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">
                                Start date and End date:
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                    <input readonly name="date" type="text" class="form-control pull-right" id="reservationtime1" value="{{ $project->start_date }} - {{ $project->end_date }}" placeholder="YYYY-MM-DD H:mm:ss - YYYY-MM-DD H:mm:ss">
                                </div>
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="inputContent1" rows="3"  class="form-control resize_vertical">{{ $project->description }}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-9">
                                {!! Form::submit('update',['class' => 'btn btn-primary']) !!}
                                &nbsp;
                                <button type="reset" class="btn btn-default bttn_reset">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop {{-- local scripts --}} 


@section('footer_scripts') 
<script src="{{asset('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/jquery.inputmask.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/inputmask/inputmask/inputmask.extensions.js')}}" type="text/javascript"></script>
<!-- date-range-picker -->
<script src="{{asset('vendors/daterangepicker/js/daterangepicker.js')}}" type="text/javascript"></script>
<!-- bootstrap time picker -->
<script src="{{asset('vendors/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/clockpicker/js/bootstrap-clockpicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/jquerydaterangepicker/js/jquery.daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/datedropper/datedropper.js')}}" type="text/javascript"></script>
<script src="{{asset('vendors/timedropper/js/timedropper.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('vendors/select2/js/select2.js')}}"></script>

<script>
$("#reservationtime1").daterangepicker({
    timePicker: true,
    autoUpdateInput: false,
    timePicker24Hour: true,
    //timePickerIncrement: 30,
    locale: {
        cancelLabel: 'Clear',
        format: 'YYYY-MM-DD H:mm:ss'
    },
    drops: "down"
}).on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD H:mm:ss') + ' - ' + picker.endDate.format('YYYY-MM-DD H:mm:ss'));
}).on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
});
$("#staf").select2({
    theme: "bootstrap"
});
</script>

@stop


