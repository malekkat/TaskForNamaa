<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('content.add_content')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('content.add_content')}}
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
                            <form role="form" action="{{route('content.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="date" >
                                <input type="hidden" name="time" >
                                <input type="hidden" name="created_by" >
                                {{--<div class="form-group">--}}
                                    {{--<label>selects language</label>--}}
                                    {{--<select class="form-control" name="content_type_id">--}}
                                            {{--<option value="{{ $type->content_type_id }}">{{ $type->type }}</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label>{{trans('content.selects')}}</label>
                                    <select class="form-control" name="content_type_id">
                                        @foreach ($content_type as $type)
                                            <option value="{{ $type->content_type_id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{trans('content.subject')}}</label>
                                    <input class="form-control" placeholder="Enter text" name="subject">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('content.content')}}</label>
                                    <textarea class="form-control" rows="3" name="text_content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default">{{trans('content.Submit_button')}}</button>
                                <button type="reset" class="btn btn-default">{{trans('content.reset_button')}}</button>
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