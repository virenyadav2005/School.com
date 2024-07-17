@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>My Student List
                            
                        </h2>
                    </div>        

            <div class="row" >
                <div class="col-md-12">

                    @include('_message')

                 
                    <div class="box" style="margin-top:10px;">
                        <div class="box-header">
                            <h3 class="box-title">My Student List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding" style="overflow: auto;">
                            <table class="table table-striped">
                                <tr>
                                    <th>Profile</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Admission Number</th>
                                    <th>Roll Number</th>
                                    <th>Class Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Caste</th>
                                    <th>Religion</th>
                                    <th>Mobile Number</th>
                                    <th>Admission Date</th>
                                    <th>Blood Group</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                </tr>
                                @foreach ($getMyStudent as  $value)
                                <tr>
                                    <td>
                                        @if(!empty($value->getProfile()))
                                        <img src="{{$value->getProfile()}}" style="width:50px; height:50px; border-radius:50px">
                                        @endif
                                    </td>
                                    <td>{{$value->name}} {{$value->last_name}}</td>
                                    <td>{{ $value->email}}</td>
                                    <td>{{$value->admission_number}}</td>
                                    <td>{{$value->roll_number}}</td>
                                    <td>
                                       {{$value->class_id}}
                                    </td>
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
                                  
                                    <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{url('parent/my_student/subject/my_subject/'.$value->id)}}">My Subject</a>
                                    </td>
                                   

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
