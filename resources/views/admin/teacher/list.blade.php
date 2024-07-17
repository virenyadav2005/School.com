@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Teacher List 
                            <i style="color: blue;">({{$getRecord->total()}})</i>
                        </h2>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> New Teacher</a>
                    </div>
                </div>
            </div>


            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Teacher</h3>
                        </div>
                        <form method="get" action="">
                            <div class="box-body">
                                <div class="form-group col-md-2">
                                    <label>Teacher Name</label>
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
                                    <label>Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option {{(Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                        <option {{(Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                        <option {{(Request::get('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number')}}"
                                         placeholder="Mobile Number" >
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Marrital Status</label>
                                    <select class="form-control" name="marrital_status">
                                        <option value="">Marital Status</option>
                                        <option {{(Request::get('marrital_status') == 0) ? 'selected' : '' }} value="Unmarried">Unmarried</option>
                                        <option {{(Request::get('marrital_status') == 1) ? 'selected' : '' }} value="Unmarried">Unmarried</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Current Address</label>
                                    <input type="text" class="form-control" name="current_address" value="{{ Request::get('current_address')}}"
                                         placeholder="Current Address" >
                                </div>
                                
                                
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option {{(Request::get('status') == 100) ? 'selected' : '' }} value="100">Active</option>
                                        <option {{(Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Date of Joining</label>
                                    <input type="date" class="form-control" name="date_of_joining" value="{{ Request::get('date_of_joining')}}" >
                                </div>
                                

                                <div class="form-group col-md-2">
                                    <label>Created Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" >
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/teacher/list')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>





            <div class="row" style="margin-top: 30px;">
                <div class="col-md-12">

                    @include('_message')

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Teacher List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" style="overflow:auto">
                            {{-- <div class="table-responsive"> --}}
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Profile</th>
                                    <th style="min-width: 10px">Teacher Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th style="min-width: 90px;">Date of Birth</th>
                                    <th style="min-width: 90px;">Date of Joining</th>
                                    <th>Mobile Number</th>
                                    <th>Marital Status</th>
                                    <th>Current Address</th>
                                    <th>Permanent Address</th>
                                    <th>Qualification</th>
                                    <th>Work Experience</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th style="min-width: 90px;">Created Time</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($getRecord as $key => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>
                                            @if(!empty($value->getProfile()))
                                            <img src="{{$value->getProfile()}}" style="width:50px; height:50px; border-radius:50px">
                                            @endif
                                        </td>
                                        <td>{{$value->name}} {{$value->last_name}}</td>
                                        <td>{{ $value->email}}</td>
                                        <td>{{ $value->gender}}</td>
                                        <td>
                                            @if (!empty($value->date_of_birth))
                                            {{date('d-m-Y',strtotime($value->date_of_birth ))}}
                                            @endif
                                        </td>
                                        <td>
                                            @if (!empty($value->date_of_joining))
                                            {{date('d-m-Y',strtotime($value->date_of_joining ))}}
                                            @endif
                                        </td>
                                        <td>{{$value->mobile_number}}</td>
                                        <td>{{$value->marital_status}}</td>
                                        <td>{{$value->current_address}}</td>
                                        <td>{{$value->permanent_address}}</td>
                                        <td>{{$value->qualification}}</td>
                                        <td>{{$value->work_experience}}</td>
                                        <td>{{$value->note}}</td>
                                        <td>{{($value->status == 100) ? 'Active' : 'Inactive'}}</td>
                                        <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                        <td style="min-width: 150px"><a href="{{ url('admin/teacher/edit/' . $value->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 4px;">Edit</a><a
                                                href="{{ url('admin/teacher/delete/' . $value->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        {{-- </div> --}}
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
