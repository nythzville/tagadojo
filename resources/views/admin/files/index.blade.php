@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="row-fluid">
        <div class="module span12">
            <div class="module-head">
                <h5>File Upload</h5>
            </div>
            <div class="module-body">
              
                {!! Form::open( array('action' => 'Admin\AdminFileController@store', 'id'=>'fileupload', 'method'=>'POST', 'enctype'=>'multipart/form-data') ) !!}
                    <div class="fileupload-buttonbar">
                        <div class="col-md-7">
                            <span class="btn btn-success fileinput-button">
                                <i class="fa fa-plus"></i>
                                <span>Add files...</span>
                                <input type="file" name="files" multiple>
                            </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="fa fa-upload"></i>
                                <span>Start upload</span>
                            </button>
                            
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                        <!-- The global progress state -->
                        <div class="col-md-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                {!! Form::Close() !!}
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="module span12">
            <div class="module-head">
                <h5>Files</h5>
            </div>
            <div class="module-body">
                <!-- The table listing the files available for upload/download -->
                    <table id="file-table" class="table">
                    <thead>
                        <tr>
                            <td>Preview</td>
                            <td>Filename</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="file-table" class="table-files">
                        @foreach($files as $file)
                        <tr class="fade in">
                            <td class="col-md-1">
                                <span class="preview">

                                    @if(explode("/",$file->mimeType)[0] =="image")
                                    
                                    <a href="{{ $file->url }}" title="{{ $file->name }}" download="{{ $file->name }}" data-gallery=""><img src="{{ URL::asset($file->thumbnailUrl) }}"></a>
                                    @else                                    
                                        <video width="200" height="140" controls>
                                          <source src="{{ $file->url }}" type="video/mp4">
                                        </video>
                                    @endif
                                </span>
                            </td>
                            <td>
                                <p class="name">{{ $file->name }}</p>
                            </td>
                            <td>
                                <p class="name">{{ $file->status }}</p>
                            </td>
                            <td>
                                {!! Form::open(array('url' => $file->deleteUrl, 'method' => 'delete')) !!}
                                <button type="submit" class="btn btn-danger btn-sm trash">
                                    <i class="fa fa-trash"></i>
                                    <span>Delete</span>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

            </div>
        </div>    
        
    </div><!--/.content-->  
  
        <!-- The blueimp Gallery widget -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td class="col-md-1">
                    <span class="preview"></span>
                </td>
                <td>
                    <p class="name">{%=file.name%}</p>
                    <strong class="error text-danger"></strong>
                </td>
                <td>
                    <p class="size">Processing...</p>
                    <div class="progress progress-striped active"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                </td>
                <td>
                    {% if (!i && !o.options.autoUpload) { %}
                        <button class="btn btn-primary btn-sm start" disabled>
                            <i class="fa fa-upload"></i>
                            <span>Start</span>
                        </button>
                    {% } %}
                    {% if (!i) { %}
                        <button class="btn btn-white btn-sm cancel">
                            <i class="fa fa-ban"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                <td>
                    <span class="preview">
                        {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                        {% } %}
                    </span>
                </td>
                <td>
                    <p class="name">
                        {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                        {% } else { %}
                            <span>{%=file.name%}</span>
                        {% } %}
                    </p>
                    {% if (file.error) { %}
                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                    {% } %}
                </td>
                <td>
                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                </td>
                <td>
                    {% if (file.deleteUrl) { %}
                        <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                        <button class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
    </script>

    <script>
        $(document).ready(function() {
            
            FormMultipleUpload.init();

            $('#fileupload').fileupload({
                singleFileUploads: true,
                imageForceResize: true,
                dataType: 'json',
                maxFileSize: 100000000,
                loadVideoFileTypes: /^video\/.*$/,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp4|wmv|avi)$/i,
                
                validate: function (data, options) {
                    if (options.disabled) {
                        return data;
                    }
                    var dfd = $.Deferred(),
                        file = data.files[data.index];
                    if (!options.acceptFileTypes.test(file.type)) {
                        file.error = 'Invalid file type.';
                        dfd.rejectWith(this, [data]);
                    } else {
                        dfd.resolveWith(this, [data]);
                    }
                    return dfd.promise();
                }
                ,
                done: function (e, data) {
                    console.log("done", data.result);

                    // set row as Done
                    data.context.text('Upload finished.');
                    var preview = "";
                    var file = data.result.files[0];
                    var mimeType = data.result.files[0].mimeType;
                    var arr_type = mimeType.split('/');

                    if(arr_type[0] == "image"){
                        preview = '<span class="preview"><a href="' + file.url + '" title="' + file.name + '" download="' + file.url + '" data-gallery=""><img src="'+ file.thumbnailUrl +'"></a></span>';
                    }else{
                        preview = '<span class="preview"><video width="200" height="140" controls=""><source src="' + file.url + '" type="' + file.mimeType + '"></video></span>';
                    }
                    var row = $('<tr class="fade in">')
                        .append('<td class="col-md-1">'+ preview + '</td>')
                        .append('<td><p class="name">' + file.name + '</p></td>')
                        .append('<td><p class="name">' + file.status + '</p></td>')
                        .append('<td><a href="' + file.deleteUrl + '" class="btn btn-danger btn-sm trash"><i class="fa fa-trash"></i><span>Delete</span></a></td>');

                    $('#file-table').DataTable().row.add(row);
                    $('#file-table tbody').prepend(row);

                },

                
            }).bind('fileuploadfinished', function (e, data) {
                /* ... */
                console.log(data);
            }).bind('fileuploadprocessalways', function(e, data)
              {
                  

              })
            ;

              
        });
        
    </script>

@endsection
