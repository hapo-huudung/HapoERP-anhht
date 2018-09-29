@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Report Overtime
                <small>{{Carbon\Carbon::now()->format('d-m-Y')}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">ReportOT</a></li>
                <li class="active">Create</li>
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
                            <h3 class="box-title">New ReportOT</h3>
                        </div>

                        <form role="form" action="{{route('reportots.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group {{  $errors->has('starts_at') ? 'has-error' : ''}}">
                                    <label for="starts_at">From</label>
                                    <input class="form-control" type="datetime-local" name="starts_at">
                                    @if ($errors->has('starts_at'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('starts_at') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{  $errors->has('ends_at') ? 'has-error' : ''}}">
                                    <label for="ends_at">To</label>
                                    <input class="form-control" type="datetime-local" name="ends_at">
                                    @if ($errors->has('ends_at'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('ends_at') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{  $errors->has('contents') ? 'has-error' : ''}}">
                                    <label for="contents">Contents</label>
                                    <textarea class="form-control" rows="3" name="contents"></textarea>
                                    @if ($errors->has('contents'))
                                        <span class="has-feedback">
                                        <strong>{{ $errors->first('contents') }}</strong>
                                    </span>
                                    @endif
                                </div>
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
