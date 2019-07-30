<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('users.tables')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('users.soft_deleted_tables')}}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">{{trans('users.no')}}</th>
                                <th class="text-center">{{trans('users.subject')}}</th>
                                <th class="text-center">{{trans('users.date')}}</th>
                                <th class="text-center">{{trans('users.time')}}</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1
                            @endphp
                            @foreach($softDel as $sDel)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{$sDel->subject}}</td>
                                    <td class="text-center">{{$sDel->created_date}}</td>
                                    <td class="text-center">{{$sDel->created_time}}</td>
                                    <td class="text-center">
                                        <p class="pull-right">
                                        <form method="POST" action="{{route('content.restore', $sDel->id)}}">
                                            @csrf
                                            <input type="hidden"  name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">{{trans('users.restore')}}</button></a>
                                        </form>
                                        </p>
                                    </td>
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