@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Change Password
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
                      <label>Old Password</label>
                      <input type="password" class="form-control" name="old_password"  required placeholder="Old Password">
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password"  required placeholder="New Password">
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

