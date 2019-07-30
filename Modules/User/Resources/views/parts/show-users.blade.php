<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('users.all_users')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('users.table_of_users')}}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">{{trans('users.no')}}</th>
                                <th class="text-center">{{trans('users.name')}}</th>
                                <th class="text-center">{{trans('users.email')}}</th>
                                <th class="text-center">{{trans('users.group_name')}}</th>
                                {{--<th class="text-center"></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1
                            @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{$user->name}}</td>
                                    <td class="text-center">{{$user->email}}</td>
                                    <td class="text-center">{{$user->group_name}}</td>
                                    {{--<td class="text-center">--}}
                                        {{--<p class="pull-right">--}}
                                            {{--<a href="{{route('content.show', $con->id)}}">--}}
                                                {{--<button type="button" class="btn btn-info">edit</button>--}}
                                            {{--</a>--}}
                                        {{--<form method="POST" action="{{route('content.destroy', $con->id)}}">--}}
                                            {{--@csrf--}}
                                            {{--<input type="hidden"  name="_method" value="DELETE">--}}
                                            {{--<input type="submit" class="btn btn-danger" name="softDelete" value="Delete">--}}
                                            {{--@if(!auth()->user()->can('content.create'))--}}
                                                {{--<input type="submit" class="btn btn-danger" name="delete" value="Full Delete">--}}
                                            {{--@endif--}}
                                        {{--</form>--}}
                                        {{--</p>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
