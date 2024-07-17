@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Parent Student List
                            <i style="color: blue;">( {{$getParent->name}} {{$getParent->last_name}})</i>
                        </h2>
                    </div>
        
            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Student</h3>
                        </div>
                        <form method="get" action="">
                            <div class="box-body">
                                <div class="form-group col-md-2">
                                    <label>Student ID</label>
                                    <input type="text" class="form-control" name="id"
                                        value="{{ Request::get('id') }}" placeholder="Student ID">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ Request::get('name') }}" placeholder="Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ Request::get('last_name') }}" placeholder=" Last Name">
                                </div>


                                <div class="form-group col-md-2">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ Request::get('email') }}" placeholder="Email">
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{ url('admin/parent/my_student/' . $parent_id) }}" type="submit"
                                    class="btn btn-success" style="margin-top: 25px">Clear</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        

            <div class="row">
                <div class="col-md-12">

                    @include('_message')

                    @if(!empty($getSearchStudent))      
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Student List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" >
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Profile</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Parent Name</th>
                                    <th>Created Time</th>
                                    <th style="min-width: 200px;">Action</th>
                                </tr>
                                @foreach ($getSearchStudent as  $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>
                                        @if(!empty($value->getProfile()))
                                        <img src="{{$value->getProfile()}}" style="width:50px; height:50px; border-radius:50px">
                                        @endif
                                    </td>
                                    <td style="min-width: 150px">{{$value->name}} {{$value->last_name}}</td>
                                    <td>{{ $value->email}}</td>
                                    <td>{{ $value->parent_name}}</td>
                                  
                                    <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                    <td style="min-width: 150px"><a href="{{ url('admin/parent/assign_student_parent/' . $value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 4px;">Assign Student to Parent</a>

                                </tr>
                            @endforeach
                            </table>
                            <div style="padding-right:30px; float: right; ">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    @endif
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Parent Student List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" style="overflow: auto;">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Profile</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Parent Name</th>
                                    <th>Created Time</th>
                                    <th style="min-width: 200px;">Action</th>
                                </tr>
                                @foreach ($getMyStudent as  $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>
                                        @if(!empty($value->getProfile()))
                                        <img src="{{$value->getProfile()}}" style="width:50px; height:50px; border-radius:50px">
                                        @endif
                                    </td>
                                    <td style="min-width: 150px">{{$value->name}} {{$value->last_name}}</td>
                                    <td>{{ $value->email}}</td>
                                    <td>{{ $value->parent_name}}</td>
                                  
                                    <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                    <td style="min-width: 150px"><a href="{{ url('admin/parent/assign_student_parent_delete/' . $value->id) }}" class="btn btn-danger btn-sm"
                                            style="margin-right: 4px;">Delete</a>

                                </tr>
                            @endforeach
                            </table>
                          
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
        </section>

    </div>
@endsection
