@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Edit Parent
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <form  method="post" action="" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">
                    <div class="row">
                       <div class="form-group col-md-6" >
                         <label>Name</label><span style="color: red;">*</span>
                         <input type="text" class="form-control" name="name" value="{{old('name' , $getRecord->name)}}" required placeholder="Name">
                         <div style="color: red;">{{ $errors->first('name') }}</div>
                        </div>

                       <div class="form-group col-md-6">
                        <label>Last Name</label><span style="color: red;">*</span>
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name', $getRecord->last_name)}}" required placeholder="Last Name">
                        <div style="color: red;">{{ $errors->first('last_name') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Gender</label><span style="color: red;">*</span>
                        <select class="form-control" name="gender" required>
                            <option value="">Select Gender</option>
                            <option {{(old('gender', $getRecord->gender) == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option {{(old('gender', $getRecord->gender) == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                            <option {{(old('gender', $getRecord->gender) == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('gender') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Occupation</label><span style="color: red;">*</span>
                        <input type="text" class="form-control" name="occupation" value="{{old('occupation', $getRecord->occupation)}}" required placeholder="Occupation">
                        <div style="color: red;">{{ $errors->first('occupation') }}</div>  
                    </div>

                    <div class="form-group col-md-6">
                      <label>Address</label><span style="color: red;">*</span>
                      <input type="text" class="form-control" name="address" value="{{old('address', $getRecord->address)}}" required placeholder="Address">
                      <div style="color: red;">{{$errors->first('Address')}}</div>  
                  </div>


                      <div class="form-group col-md-6">
                        <label>Mobile Number</label><span style="color: red;">*</span>
                        <input type="phone" class="form-control" name="mobile_number" value="{{old('mobile_number', $getRecord->mobile_number)}}" required placeholder="Mobile Number">
                        <div style="color: red;">{{ $errors->first('mobile_number') }}</div>  
                    </div>

                     

                      <div class="form-group col-md-6">
                        <label>Profile Pic</label><span style="color: red;"></span>
                        <input type="file" class="form-control" name="profile_pic" value="{{old('profile_pic')}}">
                        @if(!empty($getRecord->getProfile()))
                            <img src="{{$getRecord->getProfile()}}" style="width: 100px; height:100px; border-radius:100px">
                        @endif
                        <div style="color: red;">{{ $errors->first('profile_pic') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Status</label><span style="color: red;">*</span>
                        <select class="form-control"  name="status" required>
                        <option value="">Select Gender</option>
                            <option {{(old('status',$getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                            <option {{(old('status',$getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('status') }}</div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label>Email</label><span style="color: red;">*</span>
                      <input type="email" class="form-control" name="email" value="{{old('email', $getRecord->email)}}" placeholder="Email" required>
                      <div style="color: red">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                      <label>Password</label><span style="color: red;">*</span>
                      <input type="password" class="form-control" name="password" required placeholder="Password">
                      <div style="color: red">{{$errors->first('password')}}</div>
                    </div>
                    </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    
  
  @endsection

