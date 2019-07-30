@extends('user::layouts.master')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
    @include('user::parts.nav')
    <!-- Page Content -->
    @include('user::parts.change_pass')
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@stop
