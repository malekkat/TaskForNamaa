<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('content.all_content')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('content.table_of_content')}}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th class="text-center">     {{trans('content.no')}}</th>
                                <th class="text-center">     {{trans('content.subject')}}</th>
                                <th class="text-center">     {{trans('content.date')}}</th>
                                <th class="text-center">     {{trans('content.time')}}</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1
                            @endphp
                            @foreach($content as $con)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{$con->subject}}</td>
                                    <td class="text-center">{{$con->created_date}}</td>
                                    <td class="text-center">{{$con->created_time}}</td>
                                    <td class="text-center">
                                        <p class="pull-right">
                                            <a href="{{route('content.show', $con->id)}}">
                                                <button type="button" class="btn btn-info">{{trans('content.edit')}}</button>
                                            </a>
                                        <form method="POST" action="{{route('content.destroy', $con->id)}}">
                                            @csrf
                                            <input type="hidden"  name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-danger" name="softDelete" value="{{trans('content.delete')}}">
                                            @if(!auth()->user()->can('content.create'))
                                                <input type="submit" class="btn btn-danger" name="delete" value="{{trans('content.full_delete')}}">
                                            @endif
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