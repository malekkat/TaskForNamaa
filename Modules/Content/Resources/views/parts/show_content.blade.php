<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{trans('content.edit_content')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('content.edit_content')}}
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
                            @foreach($content as $cont)
                                <form role="form" action="{{route('content.update',$cont->id)}}" method="POST">
                                @csrf
                                <input type="hidden"  name="_method" value="PUT">
                                <input type="hidden" name="date" >
                                <input type="hidden" name="time" >
                                <input type="hidden" name="created_by" >
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
                                    <input class="form-control" placeholder="{{trans('content.enter_text')}}"
                                           name="subject"
                                           value="{{$cont->subject}}">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('content.content')}}</label>
                                    <textarea class="form-control"
                                              rows="3"
                                              name="text_content">{{$cont->text_content}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-default">{{trans('content.Submit_button')}}</button>
                                <button type="reset" class="btn btn-default">{{trans('content.reset_button')}}</button>
                                </form>
                             @endforeach
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