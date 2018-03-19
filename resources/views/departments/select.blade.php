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
                <li class="active">List Members</li>
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
                            $count = 0
                        @endphp
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member_lists as $member_list)
                                    @php
                                        $count =0
                                    @endphp
                                    @foreach($member_roles as $member_role)
                                        @if($member_role->user_id == $member_list->id)
                                            @php
                                                $count=1
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if($count != 1)
                                        <tr>
                                            <td>{{$member_list->name}}</td>
                                            <td>{{$member_list->email}}</td>
                                            <td>{{$member_list->birthday}}</td>
                                            <td>{{$member_list->address}}</td>
                                            <td>
                                                <a href="{{ route('users.departments.create',['member'=>$member_list->id,'id'=>$member_role->department_id]) }}"
                                                   class="btn btn-success">Add</a>
                                            </td>
                                        </tr>
                                    @endif
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


