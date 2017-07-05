@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="row-fluid">
        <div class="module span6">
            <div class="module-head">
                <h5>Menus</h5>
            </div>
            <div class="module-body">
                <ul id="menus">
                    @if(isset($menus))
                    @foreach($menus as $menu)
                    <li id="{{$menu->id}}" class="menu-{{ $menu->id }} {{ ($menu->id == $current_menu->id )? 'active' : '' }}">
                    {{ $menu->title }}
                    <a href="#" class="btn" title="delete"><i class="fa fa-minus"></i></a>
                    <a href="#edit-{{$menu->id}}" class="btn" title="edit"><i class="fa fa-edit"></i></a>
                    </li>
                    @endforeach
                    @endif
                    <li class="new-menu-text">
                    {!! Form::open(array('action' => 'Admin\AdminMenuController@store', 'id' => 'frm-menu')) !!}
                    <input id="new-menu" type="text" class="form-control" name="new-menu" required="">
                    {!! Form::close() !!}

                    </li>
                </ul>
                <button id="btn-add-menu" type="button" class="btn form-control" style="width: 100%"><i class="fa fa-plus"></i></button>
                <script type="text/javascript">
                    $('#btn-add-menu').click(function(){
                        $('.new-menu-text').show(500);
                    });
                    $('#frm-menu').submit(function(e){
                        // var data = $(this).serialize();
                        // $.post($(this).attr('action'), data)
                        // .success(function(response){
                        //     console.log(response);
                        // })
                        // .fail(function(response){

                        // });
                        // e.preventDefault();
                    });
                    
                    $('ul#menus li').click(function(){

                        var id = $(this).attr('id');
                        var location = "{{ url('admin/menus') }}/" + id;
                        window.location.href = location;

                        // $('ul#menus li').removeClass('active');
                        // $(this).addClass('active');
                    });
                    $(document).ready(function(){
                        if($('ul#menus li.active').length == 1){
                            $('#menu-item-list').show(500);
                        }
                    });
                </script>              
            </div>
        </div>
        <div id="menu-item-list" class="module span6" style="display: none;">
            <div class="module-head">
                <h5>{{ isset($current_menu)? $current_menu->title : '' }} items</h5>
            </div>
            <div class="module-body">
                <ul id="menu-items">
                    @if(isset($current_menu_items))
                    @foreach($current_menu_items as $item)
                    <li class="menu-item-{{ $item->id }}">{{$item->title}} <br/> <small>{{ $item->url }}</small>
                    <a href="#" class="btn" title="delete"><i class="fa fa-minus"></i></a>
                    <a href="#edit-{{$item->id}}" class="btn" title="edit"><i class="fa fa-edit"></i></a>
                    </li>
                    @endforeach
                    @endif
                    <li class="new-menu-item">
                    {!! Form::open(array('url' => 'admin/menus/'.$current_menu->id , 'id' => 'frm-menu', 'method' => 'PUT')) !!}
                    <input id="new-menu-item" type="text" class="form-control" name="new-menu-item" placeholder="Title" required="">
                    <input id="new-menu-item-url" type="text" class="form-control" name="new-menu-item-url" placeholder="URL" required="">

                    {!! Form::close() !!}

                    </li>
                </ul>
                
                <button id="add-menu-item" class="btn" style="width: 100%;"><i class="fa fa-plus"></i></button>
                <script type="text/javascript">
                    $('#add-menu-item').click(function(){
                         $('.new-menu-item').show(500);
                    });
                    $('#new-menu-item-url').on('keyup',function(event){
                      if(event.keyCode == 13){
                        $(this).closest('form').submit();
                      }
                    });
                </script>
            </div>
            
        </div>

        
    </div>
</div><!--/.content-->  
@endsection
