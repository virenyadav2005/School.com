@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Parent List 
                            <i style="color: blue;">({{$getRecord->total()}})</i>
                        </h2>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/parent/add') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Parent</a>
                    </div>
                </div>
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
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"
                                         placeholder="Name" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name')}}"
                                         placeholder=" Last Name" >
                                </div>
                                
                                
                                <div class="form-group col-md-2">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}"
                                    placeholder="Email">
                                </div>
                                

                                <div class="form-group col-md-2">
                                    <label>Created Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" >
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/parent/list')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">

                    @include('_message')

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Parent List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" style="overflow: auto;">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Mobile Number</th>
                                    <th>Occupation</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created Time</th>
                                    <th style="min-width: 200px;">Action</th>
                                </tr>
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @if(!empty($value->getProfile()))
                                            <img src="{{$value->getProfile()}}" style="width:50px; height:50px; border-radius:50px">
                                            @endif
                                        </td>
                                        <td style="min-width:100px;">{{$value->name}} {{$value->last_name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->gender}}</td>
                                        <td>{{$value->mobile_number}}</td>
                                        <td>{{$value->occupation}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{($value->status == 0)? 'Active' : 'Inactive'}}</td>
                                        <td style="min-width: 130px">{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                        <td><a href="{{ url('admin/parent/edit/' . $value->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 4px;">Edit</a><a
                                                href="{{ url('admin/parent/delete/' . $value->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                                <a
                                                href="{{ url('admin/parent/my_student/'.$value->id) }}"
                                                class="btn btn-primary btn-sm">My Student</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                            <div style="padding-right:30px; float: right; ">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
        </section>

    </div>
@endsection
