@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Assign New Class Teacher
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form method="POST" action="">
                            @csrf
                              <div class="box-body">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <select name="class_id" class="form-control">
                                        <option value="">Select Class</option>
                                        @foreach ($getClass as $class)
                                            <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Teacher Name</label>
                                    @foreach ($getTeacher as $Teacher)
                                        
                                        <div class="" style="margin-left: 3%">
                                            <label style="font-weight: normal">
                                            <input type="checkbox" value="{{$Teacher->id}}" name="teacher_id[]"> {{$Teacher->name}} {{$Teacher->last_name}}
                                            </label>
                                        </div>
                                        @endforeach
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">

                                        {{-- ?<option value="">Select</option> --}}
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
