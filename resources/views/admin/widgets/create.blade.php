@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head">
            @if(isset($widget))
            <h5>Edit Widget</h5>
            @else
            <h5>New Widget</h5>
            @endif
        </div>
        <div class="module-body">
            <div class="row-fluid">
            <!-- {!! Form::open(array('action' => 'Admin\AdminWidgetController@store')) !!} -->

                @if(isset($msg))
                <p>{{ $msg }}</p>
                @endif
                <div class="span9">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="widget_name" id="widget_name" placeholder="Widget Name" class="form-control span12" value="{{ isset($widget->id)? $widget->name : '' }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="code" id="code" placeholder="Widget Code" class="form-control span12" value="{{ isset($widget->id)? $widget->code : '' }}">
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('#widget_name').on('change keyup paste', function () {
                            var widget_name = $(this).val();
                            var permalink = widget_name.toLowerCase();
                            permalink = permalink.replace(' ','-');
                            $('#code').val('[ widget_name = "' + permalink + '" ]');
                        });
                    </script>
                    <div class="control-group">
                        <label class="control-label" for="content">Content</label>
                        <div class="controls">
                            <textarea id="widget-editor" name="content" class="form-control span12" rows="10">{{ isset($widget->id)? $widget->content : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Page Status</label>
                        <div class="controls">
                            <label class="checkbox inline">
                                <input type="checkbox" name="widget_active" value="Active" {{ (isset($widget->id) && ($widget->status == "Active"))? 'checked' : '' }}>
                                Active
                            </label>
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="save" class="btn btn-success" style="width: 100%;"><i class="fa fa-save"></i> Save</button>
                            <!-- {!! Form::token() !!} -->
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- {!! Form::close() !!} -->
        </div>
    </div>
</div><!--/.content-->  

@endsection
