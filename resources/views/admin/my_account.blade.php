@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
            My Account
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
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="{{old('name',$getData->name)}}" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" value="{{old('email',$getData->email)}}" placeholder="Email">
                      <div style="color: red">{{$errors->first('email')}}</div>
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

