@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Create New User
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

                        <form role="form" action="{{route('users.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group {{  $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="exampleInputName">Full name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter full name">
                                    @if ($errors->has('name'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{  $errors->has('email') ? 'has-error' : ''}}">
                                    <label for="exampleInputEmail">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                    @if ($errors->has('email'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password')?'has-error':''}}">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{  $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                    <label for="">Re-Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group {{  $errors->has('address') ? 'has-error' : ''}}" id="locationField">
                                    <label for="address">Address:</label>
                                    <input id="autocomplete" name="address" class="form-control" placeholder="Enter your address"
                                           onFocus="geolocate()" type="text">
                                    @if ($errors->has('address'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <!-- Date -->
                                <div class="form-group {{  $errors->has('birthday') ? 'has-error' : ''}}">
                                    <label>Day of birth</label>
                                    <input type="date" name="birthday" class="form-control pull-right" id="datepicker">
                                    @if ($errors->has('birthday'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
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
