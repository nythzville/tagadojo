@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head">
            @if(isset($user))
            <h5>Edit User</h5>
            @else
            <h5>New User</h5>
            @endif
        </div>
        <div class="module-body">
            @if(isset($user->id))
            {!! Form::open( array( 'url' => url('admin/users/'.$user->id.'') , 'method' => 'PUT')) !!}
            @else
            {!! Form::open(array('action' => 'Admin\AdminUserController@store')) !!}
            @endif
            <div class="row-fluid">
                @if(isset($msg))
                <p>{{ $msg }}</p>
                @endif
                <div class="span9">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" name="username" id="username" placeholder="User Name" class="form-control span12" value="{{ isset($user->id)? $user->name : '' }}" required="">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control span12" value="{{ isset($user->email)? $user->email : '' }}" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control span12" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Retype Password" class="form-control span12" required="">
                        </div>
                    </div>
                  
                </div>
                <div class="span3">
                    
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" name="save" class="btn btn-success" style="width: 100%;"><i class="fa fa-save"></i> Save</button>
                          
                        </div>
                    </div>
                    
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div><!--/.content-->  

@endsection
