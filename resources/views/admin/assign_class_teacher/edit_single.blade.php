@extends('layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
            Edit Class Teacher     
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
                                            <option {{($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}" >{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <select name="teacher_id" class="form-control">
                                        <option value="">Select Teacher</option>
                                        @foreach ($getTeacher as $teacher)
                                            <option {{($getRecord->teacher_id == $teacher->id) ? 'selected' : '' }} value="{{ $teacher->id }}" >{{ $teacher->name }} {{$teacher->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">

                                        <option  value="">Select</option>
                                        <option {{($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                        <option {{($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
