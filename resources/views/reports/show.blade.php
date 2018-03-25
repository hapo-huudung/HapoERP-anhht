@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Report
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Report</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- row -->
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-xs-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Report</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="today">Today</label>
                                <textarea class="form-control" rows="3" name="today_do"
                                          disabled>{{$report->today_do}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="tomorrow">Tomorrow</label>
                                <textarea class="form-control" rows="3" name="tomorrow_do"
                                          disabled>{{$report->tomorrow_do}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="problems">Problems</label>
                                <textarea class="form-control" rows="3" name="problems"
                                          disabled>{{$report->problems}}</textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{route('reports.edit', $report->id)}}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="submit('formDel')">Del</button>
                        </div>
                        <div class="hidden">
                            {{ Form::open(['id' => 'formDel', 'method' => 'DELETE', 'route' => ['reports.destroy', $report->id]]) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        function submit(formId) {
            document.getElementById(formId).submit();
        }
    </script>
    <!-- /.content-wrapper -->
@endsection
