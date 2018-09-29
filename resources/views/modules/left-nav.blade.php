<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">User</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Ability</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.show', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> Edit</a></li>
                    <li><a href="{{ route('rollcalls.index') }}"><i class="fa fa-circle-o"></i> Roll Call</a></li>
                </ul>
            </li>
            @foreach( $user_roles as $user_role)
                @foreach( $departments as $department)
                    @if( $user_role->department_id == $department->id )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                @if($department->id==1)
                                    <span>{{ $department->name }}</span>
                                @else
                                    <span>{{ 'Department_'.$department->name }}</span>
                                @endif
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @if( $user_role->create == 1)
                                    <li>
                                        <a href="{{ route('users.department.create',['id'=>$user_role->department_id]) }}"><i
                                                    class="fa fa-circle-o"></i> Create</a>
                                    </li>
                                @endif
                                @if( $user_role->read == 1)
                                    <li>
                                        <a href="{{ route('users.department.read',['id'=>$user_role->department_id]) }}"><i
                                                    class="fa fa-circle-o"></i> Read</a>
                                    </li>
                                @endif
                                @if( $user_role->update ==1)
                                    <li>
                                        <a href="{{ route('users.department.update',['id'=>$user_role->department_id]) }}"><i
                                                    class="fa fa-circle-o"></i> Update</a>
                                    </li>
                                @endif
                                @if( $user_role->delete ==1)
                                    <li>
                                        <a href="{{ route('users.department.delete',['id'=>$user_role->department_id]) }}"><i
                                                    class="fa fa-circle-o"></i> Delete</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endforeach
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Report</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('reports.index')}}"><i class="fa fa-circle-o"></i> Index</a></li>
                    <li><a href="{{route('reports.create')}}"><i class="fa fa-circle-o"></i> Create</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>ReportOTs</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('reportots.create') }}"><i class="fa fa-circle-o"></i> Create</a></li>
                    <li><a href="{{ route('reportots.index') }}"><i class="fa fa-circle-o"></i> Index</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
