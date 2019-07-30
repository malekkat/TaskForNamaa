<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module User</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/user.css') }}"> --}}

    </head>
    <body>
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/user.js') }}"></script> --}}
        <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/metisMenu.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/dataTables/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/startmin.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
    </body>
</html>
