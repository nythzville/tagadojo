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
                            <th>Page Name</th>
                            <th>Status</th>
                            <th>Author</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($pages as $page)
                        <tr class="page-{{ $page->id }}">
                            <td class="title">{{ $page->title }}</td>
                            <td class=" ">{{ $page->status }}</td>
                            <td class=" ">{{ $page->author }}</td>
                            <td class="center ">{{ $page->updated_at}}</td>
                            <td class="center "><a href="#" class="btn btn-default">Edit</a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.content-->  
@endsection
