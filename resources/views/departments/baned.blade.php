@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">List Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        @php
                            $create=\App\Models\UserRole::FALSE;
                            $read=\App\Models\UserRole::FALSE;
                            $delete=\App\Models\UserRole::FALSE;
                            $edit=\App\Models\UserRole::FALSE;
                        @endphp
                        @foreach($user_roles as $user_role)
                            @if($user_role->user_id== Auth::user()->id)
                                @if($user_role->read==\App\Models\UserRole::TRUE)
                                    @php
                                        $read=\App\Models\UserRole::TRUE;
                                    @endphp
                                @endif
                                @if($user_role->update==\App\Models\UserRole::TRUE)
                                    @php
                                        $edit=\App\Models\UserRole::TRUE;
                                    @endphp
                                @endif
                                @if($user_role->delete==\App\Models\UserRole::TRUE)
                                    @php
                                        $delete=\App\Models\UserRole::TRUE;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Ability</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member_lists as $member_list)
                                    @foreach($member_roles as $member_role)
                                        @if($member_role->user_id == $member_list->id)
                                            <tr>
                                                <td>{{$member_list->name}}</td>
                                                <td>{{$member_list->email}}</td>
                                                <td>{{$member_list->birthday}}</td>
                                                <td>{{$member_list->address}}</td>
                                                <td>
                                                    @if($member_role->create==\App\Models\UserRole::TRUE)
                                                        <span class="label label-primary">C</span>
                                                    @endif
                                                    @if($member_role->read==\App\Models\UserRole::TRUE)
                                                        <span class="label label-success">R</span>
                                                    @endif
                                                    @if($member_role->update==\App\Models\UserRole::TRUE)
                                                        <span class="label label-warning">U</span>
                                                    @endif
                                                    @if($member_role->delete==\App\Models\UserRole::TRUE)
                                                        <span class="label label-danger">D</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.departments.show',['id'=>$member_role->department_id,'user'=>$member_list->id]) }}"
                                                       class="btn btn-success {{ $read==\App\Models\UserRole::FALSE? 'hidden': '' }}">Show</a>
                                                    <a href="{{ route('users.departments.edit',['id'=>$member_role->department_id,'user'=>$member_list->id]) }}"
                                                       class="btn btn-warning {{ $edit==\App\Models\UserRole::FALSE? 'hidden': '' }}">Edit</a>
                                                    <a href="{{ route('users.departments.restore',['id'=>$member_role->department_id,'user'=>$member_list->id]) }}"
                                                       class="btn btn-primary {{ $delete==\App\Models\UserRole::FALSE && $create==\App\Models\UserRole::FALSE ? 'hidden': '' }}">Restore</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


