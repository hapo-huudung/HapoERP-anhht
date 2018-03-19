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
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Avatar</label>
                                    <div>
                                        <img src="{{ $member->avatar }}" alt="" style="width: 100px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Member since: </label>
                                    <p>{{ $member->created_at->format('d.F.y') }}</p>
                                </div>
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
                                    <label for="exampleInputName">Address</label>
                                    <div class="form-control">{{ $member->address }}</div>
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <label>Ability: </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="create" name="create" disabled
                                                   @if($member_role->create==\App\Models\UserRole::TRUE) checked @endif>
                                            <label for="create">Create</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="read" name="read" disabled
                                                   @if($member_role->read==\App\Models\UserRole::TRUE) checked @endif>
                                            <label for="read">Read</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="update" name="update" disabled
                                                   @if($member_role->update==\App\Models\UserRole::TRUE) checked @endif>
                                            <label for="update">Update</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="checkbox" id="delete" name="delete" disabled
                                                   @if($member_role->delete==\App\Models\UserRole::TRUE) checked @endif>
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
                                <a href="{{ route('users.departments.edit',['id'=>$member_role->department_id,'user'=>$member_role->user_id]) }}"
                                   class="btn btn-success {{ $edit==\App\Models\UserRole::FALSE|| $member_role->user_id==Auth::id() ? 'hidden': '' }}">Edit</a>
                                <a href="{{ route('users.departments',['id'=>$member_role->department_id]) }}" class="btn btn-primary">Back</a>
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
