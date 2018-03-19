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
                        @foreach($member_roles as $member_role)
                            <form role="form"
                                  action="{{route('users.departments.update',['id'=>$member_role->department_id,'member'=>$members->id])}}"
                                  method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Full name</label>
                                        <div class="form-control">{{ $members->name }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email address</label>
                                        <div class="form-control">{{ $members->email }}</div>
                                    </div>
                                    <!-- Date -->
                                    <div class="form-group">
                                        <label>Day of birth</label>
                                        <div class="form-control">{{ $members->birthday }}</div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <label>Ability: </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="col-sm-3">
                                                <input type="checkbox" id="create" name="create"
                                                       @if($member_role->create==\App\Models\UserRole::TRUE) checked @endif>
                                                <label for="create">Create</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="checkbox" id="read" name="read"
                                                       @if($member_role->read==\App\Models\UserRole::TRUE) checked @endif>
                                                <label for="read">Read</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="checkbox" id="update" name="update"
                                                       @if($member_role->update==\App\Models\UserRole::TRUE) checked @endif>
                                                <label for="update">Update</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="checkbox" id="delete" name="delete"
                                                       @if($member_role->delete==\App\Models\UserRole::TRUE) checked @endif>
                                                <label for="delete">Delete</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer with-border">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{ route('users.departments',['id'=>$member_role->department_id]) }}" class="btn btn-primary">Back</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        @endforeach
                    </div>
                    <!-- /.box -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div>
            <!-- /.row -->
        </section>
    </div>

@endsection
