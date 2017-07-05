@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head">
            @if(isset($page))
            <h5>Edit Page</h5>
            @else
            <h5>New Page</h5>
            @endif
        </div>
        <div class="module-body">
            {!! Form::open(array('action' => 'Admin\AdminPageController@store')) !!}
            <div class="row-fluid">
                @if(isset($msg))
                <p>{{ $msg }}</p>
                @endif
                <div class="span9">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="page_title" id="page_title" placeholder="Page Title" class="form-control span12" value="{{ isset($page->id)? $page->title : '' }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="permalink" id="permalink" placeholder="Permalink" class="form-control span12" value="{{ isset($page->id)? $page->slug : '' }}">
                        </div>
                    </div>
                    <script type="text/javascript">
                        var base_url = '{{ url('/') }}';
                        $('#page_title').on('change keyup paste', function () {
                            var page_title = $(this).val();
                            var permalink = page_title.toLowerCase();
                            permalink = permalink.replace(' ','-');
                            $('#permalink').val(base_url + '/' + permalink);
                        });

                        $('#permalink').on('change keyup paste', function () {
                            
                            var permalink = $(this).val();
                            permalink = permalink.replace(base_url+ '/','');
                            if(( permalink=='' )||(permalink==null)){

                                var page_title = $('#page_title').val();
                                permalink = page_title.toLowerCase();
                                permalink = permalink.replace(' ','-');
                            }
                            permalink = permalink.replace(' ','-');
                            $('#permalink').val(base_url + '/' + permalink);
                            
                        });
                    </script>
                    <div class="control-group">
                        <label class="control-label" for="content">Content</label>
                        <div class="controls">
                            <textarea id="editor" name="content" class="form-control span12" rows="10">{{ isset($page->id)? $page->content : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label">Page Status</label>
                        <div class="controls">
                            <label class="checkbox inline">
                                <input type="checkbox" name="page_active" value="Active" {{ (isset($page->id) && ($page->status == "Active"))? 'checked' : '' }}>
                                Active
                            </label>
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="save" class="btn btn-success" style="width: 100%;"><i class="fa fa-save"></i> Save</button>
                            {!! Form::token() !!}
                        </div>
                    </div>
                    
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div><!--/.content-->  

@endsection
