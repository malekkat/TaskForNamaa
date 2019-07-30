@extends('user::layouts.master')

@section('content')
    @if (Route::has('login'))
    <div id="wrapper">
        <!-- Navigation -->
    @include('user::parts.nav')
    <!-- Page Content -->
    @include('user::parts.content1')
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @endif
@stop
