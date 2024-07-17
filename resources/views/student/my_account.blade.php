@extends('layout.app')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Edit Student
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">

              @include('_message')
              
              <div class="box box-primary">
                <form  method="POST" action="" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">
                    <div class="row">
                       <div class="form-group col-md-6" >
                         <label>Name</label><span style="color: red;">*</span>
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
                        <label>Date of Birth</label><span style="color: red;">*</span>
                        <input type="date" format="d-m-Y" class="form-control" name="date_of_birth" value="{{old('date_of_birth',$getRecord->date_of_birth)}}" required>
                        <div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
                    </div>

                      <div class="form-group col-md-6">
                        <label>Caste</label><span style="color: red;"></span>
                        {{-- <input type="text" class="form-control" name="caste" value="{{old('caste',$getRecord->caste)}}" placeholder="Caste"> --}}
                        <select class="form-control" name="caste">
                            <option value="">Select Caste</option>
                            <option {{(old('caste',$getRecord->caste) == 'Brahmin') ? 'selected' : '' }} value="Brahmin">Brahmin</option>
                            <option {{(old('caste',$getRecord->caste) == 'Kshatriya') ? 'selected' : '' }} value="Kshatriya">Kshatriya</option>
                            <option {{(old('caste',$getRecord->caste) == 'Vaishya') ? 'selected' : '' }} value="Vaishya">Vaishya</option>
                            <option {{(old('caste',$getRecord->caste) == 'Shudra') ? 'selected' : '' }} value="Shudra">Shudra</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('caste') }}</div>
                    </div>

                      <div class="form-group col-md-6">
                        <label>Religion</label><span style="color: red;"></span>
                        {{-- <input type="text" class="form-control" name="religion" value="{{old('religion',$getRecord->religion)}}" placeholder="Religion"> --}}
                        <select class="form-control" name="religion">
                            <option value="">Select Religion</option>
                            <option {{(old('religion',$getRecord->religion) == 'Hindu') ? 'selected' : '' }} value="Hindu">Hindu</option>
                            <option {{(old('religion',$getRecord->religion) == 'Muslim') ? 'selected' : '' }} value="Muslim">Muslim</option>
                            <option {{(old('religion',$getRecord->religion) == 'Christian') ? 'selected' : '' }} value="Christian">Christian</option>
                            <option {{(old('religion',$getRecord->religion) == 'Sikh') ? 'selected' : '' }} value="Sikh">Sikh</option>
                        </select>
                        <div style="color: red;">{{ $errors->first('religion') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Mobile Number</label><span style="color: red;"></span>
                        <input type="text" class="form-control" name="mobile_number" value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Mobile Number">
                        <div style="color: red;">{{ $errors->first('mobile_number') }}</div>  
                    </div>

                  
                      <div class="form-group col-md-6">
                        <label>Profile Pic</label><span style="color: red;"></span>
                        <input type="file" class="form-control" name="profile_pic" value="{{old('profile_pic',$getRecord->profile_pic)}}">
                        <div style="color: red;">{{ $errors->first('profile_pic') }}</div>  
                        @if(!empty($getRecord->getProfile()))
                            <img src="{{$getRecord->getProfile()}}" style="width: 100px;height:100px; border-radius:100px;">
                        @endif
                    </div>

                      <div class="form-group col-md-6">
                        <label>Blood Group</label><span style="color: red;"></span>
                        <select class="form-control" name="blood_group">
                            <option value="">Select Blood Group</option>
                            <option {{(old('blood_group',$getRecord->blood_group) == 'A') ? 'selected' : '' }} value="A">A</option>
                            <option {{(old('blood_group',$getRecord->blood_group) == 'B') ? 'selected' : '' }} value="A">B</option>
                            <option {{(old('blood_group',$getRecord->blood_group) == 'AB') ? 'selected' : '' }} value="A">AB</option>
                            <option {{(old('blood_group',$getRecord->blood_group) == 'O+') ? 'selected' : '' }} value="A">O+</option>
                        </select>
                        {{-- <input type="text"  placeholder="Blood Group">--}}
                        <div style="color: red;">{{ $errors->first('blood_group') }}</div>   
                    </div>

                      <div class="form-group col-md-6">
                        <label>Weight</label><span style="color: red;"></span>
                        <input type="number" class="form-control" name="weight" value="{{old('weight',$getRecord->weight)}}" placeholder="Weight">
                        <div style="color: red;">{{ $errors->first('weight') }}</div>  
                    </div>

                      <div class="form-group col-md-6">
                        <label>Height</label><span style="color: red;"></span>
                        <input type="number" class="form-control" name="height" value="{{old('height',$getRecord->height)}}" placeholder="Height">
                        <div style="color: red;">{{ $errors->first('height') }}</div>  
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

