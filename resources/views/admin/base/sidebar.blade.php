

        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">{{Auth::user()->name}} {{Auth::user()->last_name}}</div><small>Administrator</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Panel de control</span>
                        </a>
                    </li>
                    <li class="heading">Mantenimiento</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Categorías</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('get-category')}}">Categorias</a>
                            </li>
                            <li>
                            <a href="{{route('get-subcategory')}}">Sub Categorias</a>
                            </li>
                            <li>
                                <a href="panels.html">Productos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Productos</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                            <a href="{{route('create-product')}}">Crear</a>
                            </li>
                            <li>
                                <a href="{{route('get-product')}}">Lista</a>
                            </li>
                            <li>
                                <a href="#">Galería</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
