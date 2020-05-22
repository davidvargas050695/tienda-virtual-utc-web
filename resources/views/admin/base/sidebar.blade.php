

        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img class="img-circle" src="{{ Auth::user()->url_image}}" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">{{Auth::user()->name}} {{Auth::user()->last_name}}</div>
                    <small>{{$roles_name = Auth::user()->getRoleNames()->first()}}</small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="#"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Panel de control</span>
                        </a>
                    </li>
                    <li class="heading">Mantenimiento</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Categorías</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            @can('read category')
                                <li >
                                    <a href="{{route('get-category')}}">Categorias</a>
                                </li>
                            @endcan
                            @can('read subcategory')
                                <li>
                                    <a href="{{route('get-subcategory')}}">Sub Categorias</a>
                                </li>
                            @endcan



                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Productos</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            @can('create product')
                                <li>
                                    <a href="{{route('create-product')}}">Crear</a>
                                </li>
                            @endcan
                            @can('read product')
                                <li>
                                    <a href="{{route('get-product')}}">Lista</a>
                                </li>
                            @endcan


                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Usuarios</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            @can('create user')
                                <li>
                                    <a href="{{route('create-user')}}">Crear</a>
                                </li>
                            @endcan
                            @can('read user')
                                <li>
                                    <a href="{{route('get-user')}}">Lista</a>
                                </li>
                            @endcan


                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
