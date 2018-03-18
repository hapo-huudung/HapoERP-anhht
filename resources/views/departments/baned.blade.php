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
                                @foreach($users as $user)
                                    @foreach($user_roles as $user_role)
                                        @if($user_role->user_id == $user->id)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->birthday}}</td>
                                                <td>{{$user->address}}</td>
                                                <td>
                                                    @if($user_role->create==\App\Models\UserRole::TRUE)
                                                        <span class="label label-primary">C</span>
                                                    @endif
                                                    @if($user_role->read==\App\Models\UserRole::TRUE)
                                                        <span class="label label-success">R</span>
                                                    @endif
                                                    @if($user_role->update==\App\Models\UserRole::TRUE)
                                                        <span class="label label-warning">U</span>
                                                    @endif
                                                    @if($user_role->delete==\App\Models\UserRole::TRUE)
                                                        <span class="label label-danger">D</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.departments.show',['id'=>$user_role->department_id,'user'=>$user->id]) }}"
                                                       class="btn btn-success">Show</a>
                                                    <a href="{{ route('users.departments.edit',['id'=>$user_role->department_id,'user'=>$user->id]) }}"
                                                       class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('users.departments.restore',['id'=>$user_role->department_id,'user'=>$user->id]) }}"
                                                       class="btn btn-primary">Restore</a>
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


