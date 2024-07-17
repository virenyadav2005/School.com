@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Edit Subject
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
                      <label>Subject Name</label>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}" required placeholder="Subject Name">
                    </div>

                    
                    <div class="form-group">
                        <label>Subject Type</label>
                        <select  name="type" required class="form-control">
                          <option value="" >Select Type</option>
                          <option {{($data->type == 'Th') ? 'selected': ''}} value="Th" >Theory</option>
                          <option {{($data->type == "Prac") ? 'selected' : ''}} value="Prac">Prac</option>
                          <option {{($data->type == "Prac + Th") ? 'selected' : ''}} value="Prac + Th" >Prcatical + Theory</option>
                        </select>
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

