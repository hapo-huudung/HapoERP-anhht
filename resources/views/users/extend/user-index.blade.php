@extends('layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">List Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Level</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($member_lists as $member_list)
                                    <tr>
                                        <td>{{$member_list->name}}</td>
                                        <td>{{$member_list->email}}</td>
                                        <td>{{$member_list->birthday}}</td>
                                        <td>{{$member_list->address}}</td>
                                        <td>
                                            @if($member_list->level==\App\Models\User::NORMAL)
                                                <span class="label label-default">NORMAL</span>
                                            @endif
                                            @if($member_list->level==\App\Models\User::DYNAMIC)
                                                <span class="label label-primary">DYNAMIC</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('users.manage.user.show',$member_list->id)}}" class="btn btn-success">Show</a>
                                            <a href="{{route('users.edit',$member_list->id)}}" class="btn btn-warning">Edit</a>
                                            {{--<form action="{{ route('users.destroy',['id'=>$member_list->id]) }}" method="post"--}}
                                                  {{--class="form inline">--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                {{--<button class="btn btn-danger " type="submit">Delete</button>--}}
                                            {{--</form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Birthday</th>
                                    <th>Address</th>
                                    <th>Level</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


