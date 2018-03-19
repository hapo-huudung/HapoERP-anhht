@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Edit Report
                <small>{{$timeNow}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Report</a></li>
                <li class="active">Edit</li>
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
                            <h3 class="box-title">Edit Report</h3>
                        </div>

                        <form role="form" action="{{route('reports.update')}}" method="POST">
                            {{ csrf_field() }}
                            {{ csrf_method('PUT') }}
                            <div class="box-body">
                                <div class="form-group {{  $errors->has('today_do') ? 'has-error' : ''}}">
                                    <label for="today">Today</label>
                                    <textarea class="form-control" rows="3"
                                              name="today_do">{{old('today_do')}}</textarea>
                                    @if ($errors->has('today_do'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('today_do') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{  $errors->has('tomorrow_do') ? 'has-error' : ''}}">
                                    <label for="tomorrow">Tomorrow</label>
                                    <textarea class="form-control" rows="3"
                                              name="tomorrow_do">{{old('tomorrow_do')}}</textarea>
                                    @if ($errors->has('tomorrow_do'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('tomorrow_do') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{  $errors->has('problems') ? 'has-error' : ''}}">
                                    <label for="problems">Problems</label>
                                    <textarea class="form-control" rows="3"
                                              name="problems">{{old('problems')}}</textarea>
                                    @if ($errors->has('problems'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('problems') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
