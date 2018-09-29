@extends('admins.layouts.master')
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
                    <form class="form-group form-inline" method="GET" action="{{ route('admin.absences.index') }}">
                        <input type="date" name="time" class="form-control">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <div class="col-xs-6">
                    <!-- USERS LIST -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Absence Members</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-warning">{{ $user_absence->count() }} Members</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach( $user_absence as $absence)
                                    <li>
                                        <img src="{{ asset($absence->user->avatar) }}" alt="User Image">
                                        <a class="users-list-name" href="{{ route('admin.users.show', $absence->user_id) }}">{{ $absence->user->name }}</a>
                                        <a class="users-list-dates" href="{{ route('admin.absences.show', $absence->id) }}">Detail</a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer text-center">--}}
                            {{--<a href="javascript:void(0)" class="uppercase">View All Users</a>--}}
                        {{--</div>--}}
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <div class="col-xs-12">
                    <!-- USERS LIST -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Work Members</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-success">{{ $user_work->count() }} Members</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach( $user_work as $user)
                                    <li>
                                        <img src="{{ asset($user->avatar) }}" alt="User Image">
                                        <a class="users-list-name" href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer text-center">--}}
                            {{--<a href="javascript:void(0)" class="uppercase">View All Users</a>--}}
                        {{--</div>--}}
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


