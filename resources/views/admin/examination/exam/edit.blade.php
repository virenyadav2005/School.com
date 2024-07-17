@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Edit Exam
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
                      <input type="text" class="form-control" name="name" value="{{$id->name}}" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Note</label>
                      <textarea class="form-control" name="note" placeholder="Note" required>{{$id->note}}</textarea>
                     
                      <div style="color: red">{{$errors->first('note')}}</div>
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

