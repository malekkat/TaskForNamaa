<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('users.change_password')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('users.change_password_form')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif

                                <form role="form" action="{{route('user.changed',auth()->id())}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="date" >
                                    <input type="hidden" name="time" >
                                    <div class="form-group">
                                        <label>{{trans('users.password')}}</label>
                                        <input class="form-control" placeholder="{{trans('users.enter_password')}}"
                                               name="password"
                                               type="password">
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('users.confirm_password')}}</label>
                                        <input class="form-control" placeholder="{{trans('users.enter_password')}}"
                                               name="confirm-pass"
                                               type="password">
                                    </div>
                                    <button type="submit" class="btn btn-default">{{trans('users.submit_button')}}</button>
                                    <button type="reset" class="btn btn-default">{{trans('users.reset_button')}}</button>
                                </form>

                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>