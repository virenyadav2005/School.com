@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Add New Exam
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                @include('_message')
              <div class="box box-primary">
                <form  method="POST" action="">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label>Exam Name</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Note</label>
                      <textarea class="form-control" name="note" placeholder="Note" required></textarea>
                     
                      <div style="color: red">{{$errors->first('note')}}</div>
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

