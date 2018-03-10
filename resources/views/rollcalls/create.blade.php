@extends('layouts.master')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Checked User
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Users</a></li>
                <li class="active">Check</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
               <div class="col-lg-offset-4 col-lg-4">
                   {{ Form::open(['id' => 'formDel', 'method' => 'POST', 'route' => ['rollcalls.store']]) }}
                   {{ Form::submit('Check')  }}
                   {{ Form::close() }}
               </div>
            </div>
            <!-- /.row -->
        </section>
    </div>

@endsection

