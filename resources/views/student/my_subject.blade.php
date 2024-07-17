@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>My Subject List</h2>
                    </div>
                </div>
            </div>





            <div class="row" style="margin-top: 15px">
                <div class="col-md-12">

                    @include('_message')

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">My Subject List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Subject Type</th>
                                </tr>

                                @foreach ($getRecord as $key => $value )
                                <tr>
                                    <td>{{$value->subject_name}}</td>
                                    <td>
                                        @if($value->subject_type == 'Th')
                                        Theory
                                        @elseif ($value->subject_type == 'Prac')
                                        Practical
                                        @else
                                        Practical + Theory
                                        @endif    
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
