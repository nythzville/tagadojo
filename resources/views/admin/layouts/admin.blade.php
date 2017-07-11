<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mavel Admin</title>

    <!-- Fonts -->
    {!! HTML::style('font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('themes/css/bootstrap.min.css') !!}
    
    <!-- WYSIWTG -->
    {!! HTML::style('js/wysibb/theme/default/wbbtheme.css') !!}

    {!! HTML::style('themes/css/bootstrap-responsive.min.css') !!}
    
    {!! HTML::style('css/jquery-ui.css') !!}

    {!! HTML::style('css/theme.css') !!}
    {!! HTML::script('js/jquery.min.js') !!}
    {!! HTML::script('js/jquery-ui.js') !!}
    {!! HTML::script('js/jquery-sortable.js') !!}
        
        <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
    <link href="{{ URL::asset('plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->

   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i>
                </a>

                <a class="brand" href="#">
                    ADMIN
                </a>

                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav nav-icons">
                        <li class="active"><a href="#">
                            <i class="fa fa-envelope"></i>
                        </a></li>
                        <li><a href="#">
                            <i class="fa fa-eye"></i>
                        </a></li>
                        <li><a href="#">
                            <i class="fa fa-bar-chart"></i>
                        </a></li>
                    </ul>

                    <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Item No. 1</a></li>
                                
                                <li><a href="#">Don't Click</a></li>
                                <li class="divider"></li>
                                <li class="nav-header">Example Header</li>
                                <li><a href="#">A Separated link</a></li>
                                                            </ul>
                        </li>
                        
                        <li><a href="#">
                            Support
                        </a></li>
                        <li class="nav-user dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{!! URL::asset('images/user.png') !!}" class="nav-avatar" />
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Your Profile</a></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div>
        </div><!-- /navbar-inner -->
    </div><!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <!-- Sidebar -->
                    @include('admin.layouts.sidebar')

                </div><!--/.span3-->
                <div class="span9">
                    <!-- Content -->
                    @yield('content')

                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.wrapper-->
    {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
    {!! HTML::script('js/wysibb/jquery.wysibb.min.js') !!}

    <script type="text/javascript">
        $('#editor').wysibb();
    </script>

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/vendor/tmpl.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/vendor/load-image.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload-process.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload-image.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload-audio.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload-video.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload-validate.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-file-upload/js/jquery.fileupload-ui.js') }}"></script>
    <script src="{{ URL::asset('js/form-multiple-upload.demo.min.js') }}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script src="{{ URL::asset('plugins/DataTables/js/jquery.dataTables.js') }}"></script>


    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
