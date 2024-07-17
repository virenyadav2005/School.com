@extends('layout.app')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Class Timetable List</h2>
                    </div>
                    
                </div>
            </div>




            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Class Timetable</h3>
                        </div>
                        <form method="get" action="">
                            <div class="box-body">
                                <div class="form-group col-md-3">
                                    <label>Class Name</label>
                                    <select class="form-control getClass" name="class_id" required>
                                        <option value="">Select</option>
                                        @foreach ($getClass as $class )
                                            <option value="{{$class->id}}"> {{$class->name}} </option>                                            
                                        @endforeach
                                    </select>
                                   
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Subject Name</label>
                                    <select class="form-control getSubject" name="subject_id" required>
                                        <option value="">Select</option>
                                       
                                    </select>

                                </div>
                                
                                <button type="submit" class="btn btn-primary" style="margin-top: 25px">Search</button>
                                <a href="{{url('admin/class_timetable/list')}}" type="submit" class="btn btn-success" style="margin-top: 25px">Clear</a>
                              
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>


           
        </section>

    </div>
@endsection



@section('script')

<script type="text/javascript">
    $('.getClass').change(function() {
        var class_id = $(this).val();
        $.ajax({
            url: "{{ url('admin/class_timetable/list') }}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                class_id:class_id,
            
            },
            dataType:"json",
            success:function(response){
                $('.getSubject').html(respose.html);    

            },
        });
    });

</script>
@endsection
