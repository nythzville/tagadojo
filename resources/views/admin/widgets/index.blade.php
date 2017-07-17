@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head">
            <h5>Widget List</h5>
        </div>
        <div class="module-body table">
            <div class="table-wrapper" style="width: 98%; padding: 1%;">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 display" width="100%" >
                    <thead>
                        <tr>
                            <th>Widget Name</th>
                            <th>Type</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($widgets as $widget)
                        <tr class="widget-{{ $widget->id }}">
                            <td class="widget">{{ $widget->title }}</td>
                            <td class=" ">{{ $widget->status }}</td>
                            <td class=" ">{{ $widget->author }}</td>
                            <td class="center ">{{ $widget->updated_at}}</td>
                            <td class="center "><a href="{{ url('admin/widgets/'.$widget->id) }}" class="btn btn-default">Edit</a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!--/.content-->  
@endsection
