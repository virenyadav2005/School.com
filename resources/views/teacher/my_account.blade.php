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
                <form  method="post" action="" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">
                    <div class="row">
                       <div class="form-group col-md-6" >
                         <label>First Name</label><span style="color: red;">*</span>
                         <input type="text" class="form-control" name="name" value="{{old('name',$getRecord->name)}}" required placeholder="Name">
                         <div style="color: red;">{{ $errors->first('name') }}</div>
                        </div>

                       <div class="form-group col-md-6">
                        <label>Last Name</label><span style="color: red;">*</span>
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name',$getRecord->last_name)}}" required placeholder="Last Name">
                        <div style="color: red;">{{ $errors->first('last_name') }}</div>  
                    </div>
 

                      <div class="form-group col-md-6">
                        <label>Gender</label><span style="color: red;">*</span>
                        <select class="form-control" name="gender" required>
                            <option value="">Select Gender</option>
                            <option {{(old('gender',$getRecord->gender) == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                            <option {{(old('gender',$getRecord->gender) == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                            <option {{(old('gender',$getRecord->gender) == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('gender') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Marital Status</label><span style="color: red;">*</span>
                        <select class="form-control" name="marital_status" required>
                            <option value="">Select Marital Status </option>
                            <option {{(old('marital_status',$getRecord->marital_status) == 'Unmarried') ? 'selected' : '' }} value="Unmarried">Unmarried</option>
                            <option {{(old('marital_status',$getRecord->marital_status) == 'Married') ? 'selected' : '' }} value="Married">Married</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('marital_status') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Date of Birth</label><span style="color: red;">*</span>
                        <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth',$getRecord->date_of_birth)}}" required>
                        <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Qualification</label><span style="color: red;">*</span>
                        {{-- <input type="text" class="form-control" name="religion" value="{{old('religion')}}" placeholder="Religion"> --}}
                        <select class="form-control" name="qualification" required>
                            <option value="">Select Qualification</option>
                            <option {{(old('qualification',$getRecord->qualification) == 'High school') ? 'selected' : '' }} value="High school">High school</option>
                            <option {{(old('qualification',$getRecord->qualification) == 'Diploma') ? 'selected' : '' }} value="Diploma">Diploma</option>
                            <option {{(old('qualification',$getRecord->qualification) == 'Bachelors') ? 'selected' : '' }} value="Bachelors">Bachelors</option>
                            <option {{(old('qualification',$getRecord->qualification) == 'Masters') ? 'selected' : '' }} value="Masters">Masters</option>
                            <option {{(old('qualification',$getRecord->qualification) == 'Phd') ? 'selected' : '' }} value="Phd">Phd</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('religion') }}</div>  
                    </div>

                    <div class="form-group col-md-6">
                        <label>Work Experience</label><span style="color: red;">*</span>
                        <input type="number" class="form-control" name="work_experience" value="{{old('work_experience',$getRecord->work_experience)}}" required placeholder="Years">
                        <textarea name="work_experience_detail"  style="width: 100%; margin-top:5px;"required placeholder="Write here about your experience in detail!">{{$getRecord->work_experience_detail}}</textarea>
                        <div style="color: red;">{{ $errors->first('work_experience') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Mobile Number</label><span style="color: red;">*</span>
                        <input type="phone" class="form-control" name="mobile_number" value="{{old('mobile_number',$getRecord->mobile_number)}}" required placeholder="Mobile Number">
                        <div style="color: red;">{{ $errors->first('mobile_number') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Profile Pic</label><span style="color: red;"></span>
                        <input type="file" class="form-control" name="profile_pic" value="{{old('profile_pic')}}">
                        @if(!empty($getRecord->getProfile()))
                            <img src="{{$getRecord->getProfile()}}" style="width: 100px;height:100px; border-radius:100px;">
                        @endif
                        <div style="color: red;">{{ $errors->first('profile_pic') }}</div>  
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label>Current Address</label><span style="color: red;"></span>
                        <textarea name="current_address"  style="width: 100%; margin-top:5px;" placeholder="Current Address">{{$getRecord->current_address}}</textarea>
                        <div style="color: red;">{{ $errors->first('current_address') }}</div>  
                    </div>

                    <div class="form-group col-md-6">
                        <label>Permanent Address</label><span style="color: red;"></span>
                        <textarea name="permanent_address"  style="width: 100%; margin-top:5px;" placeholder="Permanent Address">{{$getRecord->permanent_address}}</textarea>
                        <div style="color: red;">{{ $errors->first('permanent_address') }}</div>  
                    </div>
                    
                    <div class="form-group col-sm-12">
                      <label>Email</label><span style="color: red;">*</span>
                      <input type="email" class="form-control" name="email" value="{{old('email',$getRecord->email)}}" placeholder="Email" required>
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

