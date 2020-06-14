  <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li><!-- /.menu-title -->                   
                    <li>
                        <a href="{{ url('/manageblog') }}"><i class="menu-icon far fa-edit"></i>Blog</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon far fa-images"></i></i>Portfolio</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{ route('portfolio.index') }}">All Portfolios</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ route('portfolio.create') }}">New Portfolio</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fas fa-list-ol"></i></i></i>Categories</a>
                        <ul class="sub-menu children dropdown-menu">                           
                            <li><i class="fa fa-id-badge"></i><a href="{{ route('category.index') }}">Category</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{ route('subcategory') }}">Sub Category</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon far fa-image"></i>Banner</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('banner') }}">All banner</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('createbanner') }}">Create banner</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fas fa-ad"></i>Promotion</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('promotion.index') }}">All Promotion</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('promotion.create') }}">Create Promotion</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon far fa-building"></i>Company</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('profile.index') }}">Profile</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ url('/admin/about') }}">About</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="#">Team</a></li>
                        </ul>                       
                    </li>           
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->