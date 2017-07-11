<div class="sidebar">
    <ul class="widget widget-menu unstyled">
        <li class="active">
            <a href="/">
                <i class="menu-icon fa fa-home"></i>
                Dashboard
            </a>
        </li>
        
        <li>
            <a href="{{ url('admin/posts') }}">
                <i class="menu-icon fa fa-edit"></i>
                Post
                <b class="label green pull-right">11</b>
            </a>
        </li>
        
        <li>
            <a href="{{ url('admin/files') }}">
                <i class="menu-icon fa fa-edit"></i>
                Files
                <b class="label orange pull-right">19</b>
            </a>
        </li>
    </ul><!--/.widget-nav-->

    <ul class="widget widget-menu unstyled" >
        <li >
            <a class="collapsed" data-toggle="collapse" href="#togglePages">
                <i class="menu-icon fa fa-file"></i>
                <i class="fa fa-chevron-down pull-right"></i><i class="fa fa-chevron-up pull-right"></i>
                Pages
            </a>
            <ul id="togglePages" class="collapse unstyled" style="transition: all 1s;">
                <li>
                    <a href="{{ url('/admin/pages/create')}}">
                        Add Page
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/pages')}}">
                        All Pages
                    </a>
                </li>
               
            </ul>
        </li>
        <li >
            <a href="{{ url('admin/menus') }}">

                <i class="menu-icon fa fa-file"></i>
                Menus
            </a>
        </li>
        <li >
            <a href="{{ url('admin/widgets') }}">
                <i class="menu-icon fa fa-file"></i>
                Widgets
            </a>
        </li>    
    </ul>


    <ul class="widget widget-menu unstyled" >
        <li >
            <a class="collapsed" data-toggle="collapse" href="#toggleUsers">
                <i class="menu-icon fa fa-users"></i>
                <i class="fa fa-chevron-down pull-right"></i><i class="fa fa-chevron-up pull-right"></i>
                Users
            </a>
            <ul id="toggleUsers" class="collapse unstyled" style="transition: all 1s;">
                <li>
                    <a href="{{ url('admin/users/create') }}">
                        Add User
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/users') }}">
                        All Users
                    </a>
                </li>
               
            </ul>
        </li>
        <li >
            <a href="{{ url('admin/settings') }}">
                <i class="menu-icon fa fa-gear"></i>
                Settings
            </a>
            
        <li>
            <a href="{{ url('logout') }}">
                <i class="menu-icon icon-signout"></i>
                Logout
            </a>
        </li>
    </ul>

</div><!--/.sidebar-->