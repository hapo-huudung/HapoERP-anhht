@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Checked User
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Users</a></li>
                <li class="active">Check</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-lg-8 col-md-8 col-xs-8">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Members</h3>

                            <div class="box-tools pull-right">
                                <span class="label label-danger">8 New Members</span>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach($rollcalls as $rollcall)
                                    <li>
                                    <img src="{{asset('storage/'.$rollcall->user->avatar)}}" alt="User Image">
                                    <a class="users-list-name" href="{{route('users.show', $rollcall->user_id)}}">{{$rollcall->user->name}}</a>
                                    <span class="users-list-date">Today</span>
                                </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div>
            <!-- /.row -->
        </section>
    </div>

@endsection

