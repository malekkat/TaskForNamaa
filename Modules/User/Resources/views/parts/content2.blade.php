<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('users.add_user')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('users.form_add_user')}}
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
                            <form role="form" action="{{route('user.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>{{trans('users.first_name')}}</label>
                                    <input class="form-control" name="name" placeholder="{{trans('users.enter_text')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('users.email')}}</label>
                                    <input class="form-control" name="email" placeholder="{{trans('users.enter_email')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('users.selects')}}</label>
                                    <select class="form-control" name="roles_id">
                                        @if(auth()->user()->can('user.create'))
                                        <option value="super_admin">{{trans('users.super_admin')}}</option>
                                        <option value="admin">{{trans('users.admin')}}</option>
                                        @endif
                                        <option value="user">{{trans('users.user')}}</option>
                                    </select>
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