@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Exam List <i style="color: blue;">({{$getRecord->total()}})</i></h2>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/examination/exam/add') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> New Exam</a>
                    </div>
                </div>
            </div>




            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Exam</h3>
                        </div>
                        <form method="get" action="">
                            <div class="box-body">
                                <div class="form-group col-md-3">
                                    <label>Exam Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ Request::get('name')}}"
                                         placeholder="Exam Name" >
                                </div>
                            
                                <div class="form-group col-md-3">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}" >
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/examination/exam/list')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
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
                            <h3 class="box-title">Exam List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Exam Name</th>
                                    <th>Note</th>
                                    <th>Created By</th>
                                    <th>Created Time</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($getRecord as $key => $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{ $value->note }}</td>
                                        <td>{{ $value->created_name}}</td>
                                        <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                        <td><a href="{{ url('admin/examination/exam/edit/' . $value->id) }}" class="btn btn-primary"
                                                style="margin-right: 4px;">Edit</a><a
                                                href="{{ url('admin/examination/exam/delete/' . $value->id) }}"
                                                class="btn btn-danger">Delete</a>
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
