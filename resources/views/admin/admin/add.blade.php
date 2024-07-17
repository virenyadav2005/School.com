@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Add New Admin
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <form  method="POST" action="">
                    @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}" required placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
                      <div style="color: red">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
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

