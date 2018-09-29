@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Absence
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Absence</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $absences as $absence)
                        <tr>
                            <td>{{$absence->user->name}}</td>
                            <td>{{$absence->starts_at}}</td>
                            <td>{{$absence->ends_at}}</td>
                            <td>{{$absence->contents}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $absences->links() }}
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
