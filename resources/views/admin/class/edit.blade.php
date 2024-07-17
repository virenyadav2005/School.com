@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Edit Class
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
                      <label>Class Name</label>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}" required placeholder="Class Name">
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                      <select name="status" class="form-control">
                        
                        <option value="0" >Active</option>
                        <option value="1">Inactive</option>
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

