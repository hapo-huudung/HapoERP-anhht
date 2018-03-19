@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Report Overtime
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
                <div class="col-md-12">
                    <!-- The time line -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Contents</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $reportots as $reportot )
                        <tr>
                            <td>{{$reportot->user->name}}</td>
                            <td>{{$reportot->starts_at}}</td>
                            <td>{{$reportot->ends_at}}</td>
                            <td>{{$reportot->contents}}</td>
                            <td><a href="{{ route('reportots.show', $reportot->id) }}" class="btn btn-sm btn-success" >Show</a>
                            <a href="{{ route('reportots.edit', $reportot->id) }}" class="btn btn-sm btn-primary" {{ (Auth::id() == $reportot->user_id) ? '':'disabled' }}>Edit</a>
                            <button onclick="submit('formDel')" class="btn btn-sm btn-danger" {{ (Auth::id() == $reportot->user_id) ? '':'disabled' }}>Del</button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="hidden">
                        {{ Form::open(['id' => 'formDel', 'method' => 'DELETE', 'route' => ['reportots.destroy', $reportot->id]]) }}
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        function submit(formId) {
            document.getElementById(formId).submit();
        }
    </script>
@endsection
