<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin-asset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            @foreach ($items as $item )
            <li class="nav-item menu-open">
                <a href="#" class="nav-link {{$item['route'] == $active? 'active' : ''}}">
                    <i class="{{$item['icon']}}"></i>
                    <p>
                        {{$item['title']}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route($item['route'])}}" class="nav-link {{$item['route'] == $active? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{$item['title1']}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route($item['route2'])}}" class="nav-link {{$item['route2'] == $active? 'active' : ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{$item['title2']}}</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endforeach

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
