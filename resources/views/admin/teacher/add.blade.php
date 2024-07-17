@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Add New Teacher
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
                         <label>First Name</label><span style="color: red;">*</span>
                         <input type="text" class="form-control" name="name" value="{{old('name')}}" required placeholder="Name">
                         <div style="color: red;">{{ $errors->first('name') }}</div>
                        </div>

                       <div class="form-group col-md-6">
                        <label>Last Name</label><span style="color: red;">*</span>
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required placeholder="Last Name">
                        <div style="color: red;">{{ $errors->first('last_name') }}</div>  
                    </div>
 

                      <div class="form-group col-md-6">
                        <label>Gender</label><span style="color: red;">*</span>
                        <select class="form-control" name="gender" required>
                            <option value="">Select Gender</option>
                            <option {{(old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option {{(old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                            <option {{(old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('gender') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Marital Status</label><span style="color: red;">*</span>
                        <select class="form-control" name="marital_status" required>
                            <option value="">Select Marital Status </option>
                            <option {{(old('marital_status') == 'Unmarried') ? 'selected' : '' }} value="Unmarried">Unmarried</option>
                            <option {{(old('marital_status') == 'Married') ? 'selected' : '' }} value="Married">Married</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('marital_status') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Date of Birth</label><span style="color: red;">*</span>
                        <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}" required>
                        <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date of Joining</label><span style="color: red;">*</span>
                        <input type="date" class="form-control" name="date_of_joining" value="{{old('date_of_joining')}}" required>
                        <div style="color: red;">{{ $errors->first('date_of_joining') }}</div>
                    </div>

                     

                      <div class="form-group col-md-6">
                        <label>Qualification</label><span style="color: red;">*</span>
                        {{-- <input type="text" class="form-control" name="religion" value="{{old('religion')}}" placeholder="Religion"> --}}
                        <select class="form-control" name="qualification" required>
                            <option value="">Select Quallification</option>
                            <option {{(old('qualification') == 'High school') ? 'selected' : '' }} value="High school">High school</option>
                            <option {{(old('qualification') == 'Diploma') ? 'selected' : '' }} value="Diploma">Diploma</option>
                            <option {{(old('qualification') == 'Bachelors') ? 'selected' : '' }} value="Bachelors">Bachelors</option>
                            <option {{(old('qualification') == 'Masters') ? 'selected' : '' }} value="Masters">Masters</option>
                            <option {{(old('qualification') == 'Phd') ? 'selected' : '' }} value="Phd">Phd</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('religion') }}</div>  
                    </div>

                    <div class="form-group col-md-6">
                        <label>Work Experience</label><span style="color: red;">*</span>
                        <input type="number" class="form-control" name="work_experience" value="{{old('work_experience')}}" required placeholder="Years">
                        <textarea name="work_experience_detail"  style="width: 100%; margin-top:5px;"required placeholder="Write here about your experience in detail!">{{old('work_experience_detail')}}</textarea>
                        <div style="color: red;">{{ $errors->first('work_experience') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Mobile Number</label><span style="color: red;">*</span>
                        <input type="phone" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" required placeholder="Mobile Number">
                        <div style="color: red;">{{ $errors->first('mobile_number') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Profile Pic</label><span style="color: red;">*</span>
                        <input type="file" class="form-control" name="profile_pic" value="{{old('profile_pic')}}" required>
                        <div style="color: red;">{{ $errors->first('profile_pic') }}</div>  
                    </div>

                    
                      <div class="form-group col-md-6">
                        <label>Current Address</label><span style="color: red;"></span>
                        <textarea name="current_address"  style="width: 100%; margin-top:5px;" placeholder="Current Address">{{old('current_address')}}</textarea>
                        <div style="color: red;">{{ $errors->first('current_address') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Permanent Address</label><span style="color: red;"></span>
                        <textarea name="permanent_address" value="" style="width: 100%; margin-top:5px;" placeholder="Permanent Address">{{old('permanent_address')}}</textarea>
                        <div style="color: red;">{{ $errors->first('permanent_address') }}</div>  
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label>Status</label><span style="color: red;">*</span>
                      {{-- <input type="text" class="form-control" name="religion" value="{{old('religion')}}" placeholder="Religion"> --}}
                      <select class="form-control" name="status" required>
                          <option value="">Select Status</option>
                          <option {{(old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                          <option {{(old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                      </select>
                      <div style="color: red;">{{ $errors->first('status') }}</div>  
                  </div>

                    <div class="form-group col-md-6">
                        <label>Note</label><span style="color: red;"></span>
                        <textarea name="note" value="" style="width: 100%; margin-top:5px;" placeholder="Write Here!">{{old('note')}}</textarea>
                        <div style="color: red;">{{ $errors->first('note') }}</div>  
                    </div>

                    <div class="form-group col-sm-12">
                      <label>Email</label><span style="color: red;">*</span>
                      <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
                      <div style="color: red">{{$errors->first('email')}}</div>
                    </div>

                    <div class="form-group col-sm-12">
                      <label>Password</label><span style="color: red;">*</span>
                      <input type="password" class="form-control" name="password" required placeholder="Password">
                      <div style="color: red">{{$errors->first('password')}}</div>
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

