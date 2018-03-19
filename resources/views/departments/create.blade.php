@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Create New Member
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
                            <h3 class="box-title">Quick Example</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form"
                              action="{{route('users.departments.store',['id'=>$department_id,'member'=>$member->id])}}"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Full name</label>
                                    <div class="form-control">{{ $member->name }}</div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email address</label>
                                    <div class="form-control">{{ $member->email }}</div>
                                </div>
                                <!-- Date -->
                                <div class="form-group">
                                    <label>Day of birth</label>
                                    <div class="form-control">{{ $member->birthday }}</div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label>Ability: </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="create" name="create"
                                                   @if($department_role->create==1) checked @endif>
                                            <label for="create">Create</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="read" name="read"
                                                   @if($department_role->read==1) checked @endif>
                                            <label for="read">Read</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="update" name="update"
                                                   @if($department_role->update==1) checked @endif>
                                            <label for="update">Update</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="delete" name="delete"
                                                   @if($department_role->delete==1) checked @endif>
                                            <label for="delete">Delete</label>
                                        </div>
                                    </div>

                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
