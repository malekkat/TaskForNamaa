@extends('user::layouts.master')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
    @include('user::parts.nav')
    <!-- Page Content -->
    @include('user::parts.content2')
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@stop
