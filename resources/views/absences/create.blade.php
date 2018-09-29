@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Absence
                <small>{{Carbon\Carbon::now()->format('d-m-Y')}}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Absence</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-offset-3 col-md-6 col-xs-12">
                    <button class="btn btn-primary">{{}}Check</button>
                </div>
                <!--/.col (left) -->
                <!-- right column -->
            </div>
            <!-- /.row -->
        </section>
    </div>

@endsection
