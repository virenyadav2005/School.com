@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>My Class & Subject</h2>
                    </div>
                   
                </div>
            </div>


            <div class="row" style="margin-top:10px">
                <div class="col-md-12">

                    @include('_message')

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">My Class & Subject</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Class Name</th>
                                    <th>Subject Name</th>
                                    <th>Subject Type</th>
                                    <th>Created Time</th>
                                </tr>
                                
                                @foreach ($getRecord as $key => $value)
                                                                   
                                    <tr>    
                                        <td>{{($value->class_name) }}</td>
                                        <td>{{$value->subject_name}}</td>
                                        <td>
                                            @if ($value->subject_type == 'Th')
                                                {{'Theory'}}
                                            @elseif ($value->subject_type == 'Prac')
                                                {{'Practical'}}
                                            @else
                                            {{'Theory + Practical'}}
                                                
                                            @endif
                                            </td>
                                        <td>{{ date('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            {{-- <div style="padding-right:30px; float: right; ">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div> --}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </section>
        </div>

@endsection
