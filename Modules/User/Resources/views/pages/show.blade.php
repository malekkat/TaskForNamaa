@extends('user::layouts.master')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
    @include('user::parts.nav')
    <!-- Page Content -->
    @include('user::parts.view-user')
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@stop
