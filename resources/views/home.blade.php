@extends('layouts.master')
@section('title')
Dashboard
@endsection

@section('page')
    Page
@endsection
@section('content')


@php
    $departmentName = '';
    switch(Auth::user()->department_id) {
        case 1:
            $departmentName = "'dashboards.masterdashboard'";
            break;
        case 2:
            $departmentName = 'Sales';
            break;
        case 3:
            $departmentName = 'Collection';
            break;
        case 4:
            $departmentName = 'Accountant';
            break;
    }
@endphp

@if($departmentName!='')
    @include($departmentName);
@endif


@endsection
