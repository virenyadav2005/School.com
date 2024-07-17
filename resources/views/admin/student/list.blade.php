@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Student List <i style="color: blue;">({{$getRecord->total()}})</i></h2>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> New Student</a>
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
                                    <label>Admission Number</label>
                                    <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number')}}"
                                         placeholder="Admission Number" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Roll Number</label>
                                    <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number')}}"
                                         placeholder="Roll Number" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Class</label>
                                    <input type="text" class="form-control" name="class" value="{{ Request::get('class')}}"
                                         placeholder="Class Name" >
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
                                    <label>Caste</label>
                                    <input type="text" class="form-control" name="caste" value="{{ Request::get('caste')}}"
                                         placeholder="Class Name" >
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Religion</label>
                                    <input type="text" class="form-control" name="religion" value="{{ Request::get('religion')}}"
                                         placeholder="Religion" >
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number')}}"
                                         placeholder="Mobile Number" >
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Blood Group</label>
                                    <input type="text" class="form-control" name="blood_group" value="{{ Request::get('blood_group')}}"
                                         placeholder="Blood Group" >
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
                                    <label>Admission Date</label>
                                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date')}}" >
                                </div>
                                

                                <div class="form-group col-md-2">
                                    <label>Created Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" >
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/student/list')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
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
                            <h3 class="box-title">Student List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" style="overflow:auto">
                            {{-- <div class="table-responsive"> --}}
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Profile</th>
                                    <th style="min-width: 150px">Student Name</th>
                                    <th>Parent Name</th>
                                    <th>Email</th>
                                    <th>Admission Number</th>
                                    <th>Roll Number</th>
                                    <th>Class Name</th>
                                    <th>Gender</th>
                                    <th style="min-width: 90px;">Date of Birth</th>
                                    <th>Caste</th>
                                    <th>Religion</th>
                                    <th>Mobile Number</th>
                                    <th style="min-width: 90px;">Admission Date</th>
                                    <th>Blood Group</th>
                                    <th>Weight</th>
                                    <th>Height</th>
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
                                        <td>{{$value->parent_name}} {{$value->parent_last_name}}</td>
                                        <td>{{ $value->email}}</td>
                                        <td>{{$value->admission_number}}</td>
                                        <td>{{$value->roll_number}}</td>
                                        <td>{{$value->class_name}}</td>
                                        <td>{{$value->gender}}</td>
                                        <td>
                                            @if (!empty($value->date_of_birth))
                                            {{date('d-m-Y',strtotime($value->date_of_birth ))}}
                                            @endif
                                           </td>
                                        <td>{{$value->caste}}</td>
                                        <td>{{$value->religion}}</td>
                                        <td>{{$value->mobile_number}}</td>
                                        <td>
                                            @if (!empty($value->date_of_birth))
                                            {{date('d-m-Y',strtotime($value->admission_date))}}
                                            @endif
                                            </td>
                                        <td>{{$value->blood_group}}</td>
                                        <td>{{$value->weight}}</td>
                                        <td>{{$value->height}}</td>
                                        <td>{{($value->status == 100) ? 'Active' : 'Inactive'}}</td>
                                        <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                        <td style="min-width: 150px"><a href="{{ url('admin/student/edit/' . $value->id) }}" class="btn btn-primary btn-sm"
                                                style="margin-right: 4px;">Edit</a><a
                                                href="{{ url('admin/student/delete/' . $value->id) }}"
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
