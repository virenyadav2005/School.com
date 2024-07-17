@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Subject List</h2>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ Url('admin/subject/add') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Add New Subject</a>
                    </div>
                </div>
            </div>




            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Subject</h3>
                        </div>
                        <form method="get" action="">
                            <div class="box-body">
                                <div class="form-group col-md-3">
                                    <label>Subject Name</label>
                                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}"
                                         placeholder="Subject Name" >
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Subject Type</label>
                                    <select  name="type" required class="form-control">
                                        <option  value="" >Select Type</option>
                                        <option {{(Request::get('type') == 'Th') ? 'selected' : ''}} value="Th">Theory</option>
                                        <option {{(Request::get('type') == 'Th') ? 'selected' : ''}} value="Prac">Practical</option>
                                        <option {{(Request::get('type') == 'Prac + Th') ? 'selected' : ''}} value="Prac + Th" >Prcatical + Theory</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Created Date</label>
                                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}">
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/subject/list')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
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
                            <h3 class="box-title">Subject List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Subject Name</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                    <th>Created Time</th>
                                    <th >Action</th>
                                </tr>

                                @foreach($getRecord as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{strtoupper($data->name)}}</td>
                                    <td>
                                        @if($data->type == 'Th')
                                        Theory
                                        @elseif ($data->type == 'Prac')
                                        Practical
                                        @else
                                        Theory + Practical
                                        @endif
                                    </td>
                                    <td>{{strtoupper($data->Created_by_Name)}}</td>
                                    <td>
                                        @if($data->status == 0)
                                        Active
                                        @else
                                        Inactive
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y H:i A',strtotime($data->created_at))}}</td>
                                    <td>
                                        <a href="{{url('admin/subject/edit/'.$data->id)}}"><i class="btn btn-primary">Edit</i></a>
                                        <a href="{{url('admin/subject/delete/'.$data->id)}}"><i class="btn btn-danger">Delete</i></a>
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
