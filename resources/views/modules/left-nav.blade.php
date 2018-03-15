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
                    <li><a href="{{ route('users.show', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> Show</a>
                    </li>
                    <li><a href="{{ route('users.edit', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> Edit</a>
                    </li>
                    <li><a href="{{ route('users.rollcall', Auth::user()->id) }}"><i class="fa fa-circle-o"></i> Roll
                            Call</a></li>
                </ul>
            </li>
            @if(Auth::user()->level == \App\Models\User::DYNAMIC)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Ability_Extend</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                           </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>List User</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Create User</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>List Department</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Create Department</a></li>

                    </ul>
                </li>
            @endif
            @foreach( $user_roles as $user_role)
                @foreach( $departments as $department)
                    @if( $user_role->department_id == $department->id )
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>{{ 'Department_'.$department->name }}</span>
                                <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @if( $user_role->create == 1)
                                    <li>
                                        <a href="{{ route('users.departments.select',['id'=>$user_role->department_id]) }}"><i
                                                    class="fa fa-circle-o"></i> Create Member</a>
                                    </li>
                                @endif
                                @if( $user_role->read == 1)
                                    <li>
                                        <a href="{{ route('users.departments',['id'=>$user_role->department_id]) }}"><i
                                                    class="fa fa-circle-o"></i> List Member</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endforeach

    </section>
    <!-- /.sidebar -->
</aside>
