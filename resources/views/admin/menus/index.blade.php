@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="row-fluid">
        <div class="module span6">
            <div class="module-head">
                <h5>Menus</h5>
            </div>
            <div class="module-body">
                <table id="menus" class="table">
                    @if(isset($menus))
                    @foreach($menus as $menu)
                    <tr id="{{$menu->id}}" class="menu-{{ $menu->id }} {{ ($menu->id == $current_menu->id )? 'active' : '' }}">
                        <td class="menu-name">
                            <p>{{ $menu->title }}</p>
                            {!! Form::open(array('url' => 'admin/menus/'.$menu->id , 'id' => 'frm-edit-menu-'.$menu->id, 'class' => 'frm-edit-menu', 'method' => 'PUT')) !!}
                            <input type="hidden" name="_action" value="edit_menu">
                            <input type="text" name="menu-edit-name" value="{{ $menu->title }}" class="form-control" required>
                            {!! Form::close() !!}
                        </td>
                        <td width="25%">
                            <div class="menu-action-buttons">
                                <!-- <a id="delete-{{ $menu->id }}" class="delete-menu btn" title="Delete"><i class="fa fa-minus"></i></a> -->
                                {!! Form::open(array('url' => 'admin/menus/'.$menu->id , 'id' => 'frm-delete-menu-'.$menu->id, 'class' => 'frm-delete-menu', 'method' => 'DELETE')) !!}
                                    <button type="submit" class="btn"><i class="fa fa-minus"></i></button>
                                {!! Form::close() !!}
                                <a id="edit-{{$menu->id}}" class="edit-menu btn" title="Edit"><i class="fa fa-edit"></i></a>
                                
                            </div>
                            <div class="menu-edit-buttons" style="display: none;">
                                <a class="cancel btn" title="Cancel"><i class="fa fa-close"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        
                    </tr>
                    <tr id="new-menu-text"><td colspan="2">
                    {!! Form::open(array('action' => 'Admin\AdminMenuController@store', 'id' => 'frm-menu')) !!}
                    <input id="new-menu" type="text" class="form-control" name="new-menu" required="">
                    {!! Form::close() !!}   
                    </td>
                    </tr>
                </table>
                <!-- </ul> -->
                <button id="btn-add-menu" type="button" class="btn form-control" style="width: 100%"><i class="fa fa-plus"></i></button>
                <script type="text/javascript">
                    $('#btn-add-menu').click(function(){
                        $('#new-menu-text').show(500);
                        $('#new-menu-text input[type=text]').focus();

                    });
                    
                    // updating Menu
                    $('.edit-menu').click(function(){
                        var id  = $(this).closest('tr').attr('id');
                        
                        $('#'+ id).addClass('editing-menu');
                        $('#'+ id + ' td.menu-name p').hide();
                        $('#'+ id + ' td.menu-name form').show(500);
                        $('#'+ id + ' td.menu-name form input[type=text]').focus();

                        $('#'+ id + ' .menu-action-buttons').hide();
                        $('#'+ id + ' .menu-edit-buttons').show();


                    });

                    // Cancel edit
                    $('a.cancel').click(function(){
                        var id = $(this).closest('tr').attr('id');

                        $('#'+ id).removeClass('editing-menu');
                        $('#'+ id + ' td.menu-name p').show(500);
                        $('#'+ id + ' td.menu-name form').hide();

                        $('#'+ id + ' .menu-action-buttons').show();
                        $('#'+ id + ' .menu-edit-buttons').hide();
                    });


                    $('table#menus tr td.menu-name').click(function(){

                        if(!$(this).closest('tr').hasClass('editing-menu')){
                            var id = $(this).closest('tr').attr('id');
                            var location = "{{ url('admin/menus') }}/" + id;
                            window.location.href = location;
                        }
                        
                    });
                    $(document).ready(function(){
                        if($('table#menus tr.active').length == 1){
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
                    $( "#menu-items" ).sortable();
                </script>
            </div>
            
        </div>

        
    </div>
</div><!--/.content-->  
@endsection
