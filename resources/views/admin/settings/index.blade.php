@extends('admin.layouts.admin')

@section('content')

<div class="content">
    <div class="row-fluid">
        <div class="module span6">
            <div class="module-head">
                <h5>Site Settings</h5>
            </div>
            <div class="module-body">
                {!! Form::open(array('id' => 'frm-site-settings', 'action' => 'Admin\AdminSettingController@store')) !!}
                    <input type="hidden" name="_action" value="save_site_settings">
                    <div class="row-fluid">
                        <div class="control-group">
                            <label class="control-label" for="site_name">Site Name</label>
                            <input type="text" name="site_name" class="form-control span12" placeholder="Site Name" value="{{ ( isset($settings['site_name']))? $settings['site_name'] : '' }}">
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="site_name">Tag Line</label>
                            <input type="text" name="tagline" class="form-control span12" placeholder="Tag Line"  value="{{ ( isset($settings['tagline']))? $settings['tagline'] : '' }}">
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="site_name">Meta Description</label>
                            <textarea name="meta_description" class="form-control span12">{{ ( isset($settings['meta_description']))? $settings['meta_description'] : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn" style="width: 100%;"><i class="fa fa-save"></i> SAVE</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        
        <!-- Front Page Display -->
        <div class="module span6">
            <div class="module-head">
                <h5>Front Page Display</h5>
            </div>
            <div class="module-body">
                {!! Form::open(array('id' => 'frm-front-page', 'action' => 'Admin\AdminSettingController@store')) !!}
                    <input type="hidden" name="_action" value="save_frontpage_settings">
                    <div class="form-group">
                        <label for="frontpage">Front Page</label>
                        <select name="frontpage" class="form-control span12">
                            <option>-- Select --</option>
                            @if(isset($pages))
                            @foreach($pages as $page)
                            <option value="{{ $page->id }}" {{ ( isset($settings['frontpage']) && $page->id == $settings['frontpage'])? 'selected': '' }}>{{ $page->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="blogpage">Blog Page</label>
                        <select name="blogpage" class="form-control span12">
                            <option>-- Select --</option>
                            @if(isset($pages))
                            @foreach($pages as $page)
                            <option value="{{ $page->id }}" {{ ( isset($settings['blogpage']) && $page->id == $settings['blogpage'])? 'selected': '' }}>{{ $page->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn" style="width: 100%;"><i class="fa fa-save"></i> SAVE</button>

                    </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="module span6">
            <div class="module-head">
                <h5>Menu Settings</h5>
            </div>
            <div class="module-body">
                {!! Form::open(array('id' => 'frm-menu-settings')) !!}
                    <input type="hidden" name="_action" value="save_menu_settings">
                    <div class="form-group">
                    <label for="primary-menu">Primary Menu</label>
                        <select name="primary-menu" class="form-control span12">
                            <option>-- Select --</option>
                            @if(isset($menus))
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}" {{ ($menu->id == $settings['primary_menu'])? 'selected': '' }}>{{ $menu->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="primary-menu">Footer Menu</label>
                        <select name="footer-menu" class="form-control span12">
                            <option>-- Select --</option>
                            @if(isset($menus))
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn" style="width: 100%;"><i class="fa fa-save"></i> SAVE</button>

                    </div>
                {!! Form::close() !!}
            </div>
            
        </div>
        
        
    </div>
</div><!--/.content-->  
@endsection
