@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head">
            <h5>Page List</h5>
        </div>
        <div class="module-body table">
            <div class="table-wrapper" style="width: 98%; padding: 1%;">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 display" width="100%" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($users as $user)
                        <tr class="user-{{ $user->id }}">
                            <td class="username">{{ $user->name }}</td>
                            <td class=" ">{{ $user->email }}</td>
                            <td class="center ">{{ $user->created_at}}</td>
                            <td class="center "><a href="{{ url('admin/users/'.$user->id.'/edit' )}}" class="btn btn-default">Edit</a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.content-->  
@endsection
