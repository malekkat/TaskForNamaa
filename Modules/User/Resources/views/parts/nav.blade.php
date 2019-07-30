<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{route('user.index')}}"><i class="fa fa-home fa-fw"></i> {{trans('nav.dashboard')}}</a></li>
    </ul>
    <!- this section for notification ->
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{route('user.show',Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i> {{trans('nav.user_profile')}}</a>
                </li>
                <li><a href="{{route('user.changePass',Auth::user()->id)}}"><i class="fa fa-gear fa-fw"></i> {{trans('nav.settings')}}</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i> {{trans('nav.logout')}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-language fa-fw"></i> <b class="caret"></b> 
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="{{ url('lang/en/') }}">
                        <div>
                            <i class="fa fa-language fa-fw"></i>  EN
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('lang/ar/') }}">
                        <div>
                            <i class="fa fa-language fa-fw"></i>  AR
                        </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="{{trans('nav.search')}}">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                @if(!auth()->user()->can('content.create'))
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-fw"></i> {{trans('nav.users')}}
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('user.create')}}">{{trans('nav.add_users')}}</a>
                        </li>
                        <li>
                            <a href="{{route('user.getAll')}}">{{trans('nav.view_users')}}</a>
                        </li>
                        <li>
                            <a href="{{route('content.del_content')}}">{{trans('nav.deleted_content')}}</a>
                        </li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>
                @endif
                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> {{trans('nav.content')}}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('content.create')}}">{{trans('nav.add_content')}}</a>
                        </li>
                        <li>
                            <a href="{{route('content.index')}}">{{trans('nav.view_content')}}</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>