@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roll Call
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Roll Call</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    @if ( $check )
                        <div class="alert alert-success"> You checked in </div>
                    @else
                        <div class="alert alert-warning"> You do not check in
                            <button onclick="submit('formStore')" class="btn btn-link" >Check now</button>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <!-- The time line -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $rollcalls as $rollcall )
                            <tr>
                                <td>{{$rollcall->user->name}}</td>
                                <td>{{$rollcall->created_at}}</td>
                                <td>{{ ($rollcall->status == \App\Models\RollCall::LATE)? "late":"on time" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>{{ $rollcalls->links() }}</div>
                    <div class="hidden">
                        {{ Form::open(['id' => 'formStore', 'method' => 'POST', 'route' => ['rollcalls.store']]) }}
                        {{ Form::close() }}
                    </div>
                </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
