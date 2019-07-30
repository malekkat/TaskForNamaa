@extends('content::layouts.master')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
    @include('user::parts.nav')
    <!-- Page Content -->
    @include('content::parts.view')
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@stop
