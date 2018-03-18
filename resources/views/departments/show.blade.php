@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Edit Profile Ability
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-offset-3 col-md-6 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @foreach($user_roles as $user_role)
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Avatar</label>
                                    <div>
                                        <img src="{{ $users->avatar }}" alt="" style="width: 100px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Member since: </label>
                                    <p>{{ $users->created_at->format('d.F.y') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Full name</label>
                                    <div class="form-control">{{ $users->name }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email address</label>
                                    <div class="form-control">{{ $users->email }}</div>
                                </div>
                                <!-- Date -->
                                <div class="form-group">
                                    <label>Day of birth</label>
                                    <div class="form-control">{{ $users->birthday }}</div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Address</label>
                                    <div class="form-control">{{ $users->address }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <label>Ability: </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="create" name="create" disabled
                                                   @if($user_role->create==1) checked @endif>
                                            <label for="create">Create</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="read" name="read" disabled
                                                   @if($user_role->read==1) checked @endif>
                                            <label for="read">Read</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="update" name="update" disabled
                                                   @if($user_role->update==1) checked @endif>
                                            <label for="update">Update</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="delete" name="delete" disabled
                                                   @if($user_role->delete==1) checked @endif>
                                            <label for="delete">Delete</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                            </div>
                    @endforeach

                    <!-- /.box -->
                        <div class="box-footer with-border">
                            <div class="text-center">
                                <a href="#" class="text-centre btn btn-success">Edit</a>
                            </div>
                        </div>
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                </div>
                <!-- /.row -->
        </section>
    </div>

@endsection
