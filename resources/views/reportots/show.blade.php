@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ReportOT
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">ReportOT</a></li>
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
                            <h3 class="box-title">ReportOT</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="today">From</label>
                                <input class="form-control" value="{{$reportot->starts_at}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="tomorrow">To</label>
                                <input class="form-control" value="{{$reportot->ends_at}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="problems">Contents</label>
                                <input class="form-control" value="{{$reportot->contents}}" disabled>
                            </div>
                        </div>
                        <div class="box-footer {{ (Auth::id() == $reportot->user_id) ? '':'hidden' }}">
                            <a href="{{route('reportots.edit', $reportot->id)}}" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="submit('formDel')">Del</button>
                        </div>
                        <div class="hidden">
                            {{ Form::open(['id' => 'formDel', 'method' => 'DELETE', 'route' => ['reportots.destroy', $reportot->id]]) }}
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
