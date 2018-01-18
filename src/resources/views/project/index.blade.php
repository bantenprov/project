@extends('layouts/default') 
{{-- Page title --}} 
@section('title') 
{{ $title }} 
@stop {{-- local styles --}} 
@section('header_styles') 
@stop 
{{-- Page Header--}} 
@section('page-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('index')}}">
                <i class="fa fa-fw fa-home"></i> Dashboard
            </a>
        </li>
        <li class="active">
            Project
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
    <div class="alert alert-danger">
        <ul style="padding:0;">
            <li>{{ session()->get('message') }}</li>
        </ul>
    </div>
@endif
</div>   

<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('taskManagementProjectCreate') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-fw fa-plus"></i>
            Add new project
        </a>
    </div>
</div>
<br><br>
<div class="row">    
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Project List
                </h3>
                <span class="pull-right">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Project Name</th>
                                <th>OPD</th>
                                <th>Staf</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $key => $project)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <a href="{{ route('taskManagementProjectShow',$project->id) }}">{{ $project->name }}</a>
                                </td>
                                <td>{{ $project->getOpd->name }}</td>
                                <td>{{ $project->getStaf->full_name }}</td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>{{ substr($project->description, 0,20) }} ...</td>
                                <td>
                                    <a class="btn btn-success btn-xs" href="{{ route('taskManagementProjectEdit',$project->id) }}" data-toggle="modal" data-placement="top"><span class="fa fa-fw ti-pencil"></span></a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('taskManagementProjectDestroy',$project->id) }}" data-toggle="modal" data-placement="top"><span class="fa fa-fw fa-times"></span></a>  
                                </td>            
                            </tr>
                            @empty
                                <tr>
                                    <td colspan='7' align="center">belum ada data</td>
                                </tr>
                            @endforelse                           
                        </tbody>
                    </table>
                </div>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</div>

@stop {{-- local scripts --}} 


@section('footer_scripts') @stop
