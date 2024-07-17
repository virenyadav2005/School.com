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
                                            <option {{($getRecord->class_id == $class->id) ? 'selected' : '' }}  value="{{ $class->id }}" >{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Teacher Name</label>
                                    @foreach ($getTeacher as $Teacher)
                                        @php
                                            $checked = '';
                                        @endphp

                                        @foreach ($getAssignTeacherID as $TeacherID)
                                            @if($TeacherID->teacher_id == $Teacher->id)
                                                @php
                                                    $checked = 'checked';
                                                @endphp
                                            @endif
                                        @endforeach
                                        <div class="" style="margin-left: 3%">
                                            <label style="font-weight: normal">
                                            <input  {{$checked}} type="checkbox" value="{{$Teacher->id}}" name="teacher_id[]"> {{$Teacher->name}} {{$Teacher->last_name}}
                                            </label>
                                        </div>
                                        @endforeach
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">

                                        {{-- ?<option value="">Select</option> --}}
                                        <option {{($getRecord->status == 0) ? 'selected' : '' }}  value="0">Active</option>
                                        <option {{($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
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
