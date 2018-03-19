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
                <div class="col-md-12">
                    <!-- The time line -->
                    <ul class="timeline">
                    @foreach($reportTimes as $reports)
                        <!-- timeline time label -->
                            <li class="time-label">
                              <span class="bg-red">
                                {{$reports[0]->created_at->format('d-m-Y')}}
                              </span>
                            </li>
                            <!-- /.timeline-label -->
                        @foreach($reports as $report)
                            <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i
                                                    class="fa fa-clock-o"></i>{{$report->created_at->format('H:m')}}</span>

                                        <h3 class="timeline-header"><a href="#">{{$report->user->name}}</a></h3>

                                        <div class="timeline-body">
                                            <h5><strong>1. Today</strong></h5>
                                            <p>{{$report->today_do}}</p>
                                            <h5><strong>2. Tomorrow</strong></h5>
                                            <p>{{$report->tomorrow_do}}</p>
                                            <h5><strong>3. Problems</strong></h5>
                                            <p>{{$report->problems}}</p>

                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{route('reports.show',$report->id)}}"
                                               class="btn btn-primary btn-xs">Detail</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
