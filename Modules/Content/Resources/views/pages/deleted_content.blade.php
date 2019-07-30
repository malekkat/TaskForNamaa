@extends('content::layouts.master')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
    @include('user::parts.nav')
    <!-- Page Content -->
    @include('content::parts.deleted_content')
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@stop
