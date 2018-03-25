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
                                <label for="from">From</label>
                                <input type="text" value="{{$absence->starts_at}}" disabled name="starts_at" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="to">To</label>
                                <input type="text" value="{{$absence->ends_at}}" disabled name="ends_at" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="problems">Contents</label>
                                <textarea class="form-control" rows="5" name="contents" disabled>{{$absence->contents}}</textarea>
                            </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

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
