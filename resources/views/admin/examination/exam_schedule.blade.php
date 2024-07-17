@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Exam Schedule</h2>
                    </div>
                </div>
            </div>




            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Exam Schedule</h3>
                        </div>
                        <form method="get" action="">
                            <div class="box-body">
                                <div class="form-group col-md-3">
                                    <label>Exam</label>
                                    <select class="form-control" name="exam_id" required>
                                        <option value="">Select</option>
                                        @foreach ($getExam as $Exam )
                                            <option {{(Request::get('$Exam->id') == $Exam->id) ? 'seleted' : ''}}  value="{{$Exam->id}}">{{$Exam->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Class</label>
                                    <select class="form-control" name="class_id" required>
                                        <option value="">Select</option>
                                        @foreach ($getClass as $Class )
                                            <option {{(Request::get('$Class->id') == $Class->id) ? 'seleted' : ''}} value="{{$Class->id}}">{{$Class->name}}</option>                
                                        @endforeach
                                    </select>
                                </div>
                            
                                
                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/examination/exam_schedule')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
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
                            <h3 class="box-title">Exam Schedule</h3>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
