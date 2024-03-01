@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1302.32px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">



      </div><!-- /.container-fluid -->
    </section>

   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-6">
                          <label">First Name <span class="text-danger">*</span></label>
                          <input type="text"
                          class="form-control"
                          name="name"
                          value="{{ old('name', $getRecord->name) }}"
                          placeholder="First name"
                          >
                          <span class="text-danger">{{ $errors->first('name') }}</span>
                      </div>
                      <div class="form-group col-md-6">
                          <label">Last Name <span class="text-danger">*</span></label>
                          <input type="text"
                          class="form-control"
                          name="last_name"
                          value="{{ old('last_name', $getRecord->last_name) }}"
                          placeholder="Last name"
                          >
                          <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                          <label">Gender <span class="text-danger">*</span></label>
                          <select class="form-control"  name="gender">
                              <option value="">Select a Gender</option>
                              <option {{ old('gender', $getRecord->gender) == 'male' ? 'selected' : ''}} value="male">Male</option>
                              <option {{ old('gender', $getRecord->gender) == 'female' ? 'selected' : ''}} value="female">Female</option>
                          </select>
                          <span class="text-danger">{{ $errors->first('gender') }}</span>
                      </div>

                      <div class="form-group col-md-6">
                          <label">Occupation<span class="text-danger"></span></label>
                          <input type="text"
                          class="form-control"
                          name="occupation"
                          value="{{ old('occupation', $getRecord->occupation) }}"
                          placeholder="Occupation"
                          >
                          <span class="text-danger">{{ $errors->first('occupation') }}</span>
                      </div>

                      <div class="form-group col-md-6">
                          <label">Mobile Number<span class="text-danger">*</span></label>
                          <input type="text"
                          class="form-control"
                          name="mobile_number"
                          value="{{ old('mobile_number', $getRecord->mobile_number) }}"
                          placeholder="Mobile Number"

                          >
                          <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                      </div>

                      <div class="form-group col-md-6">
                          <label">Address<span class="text-danger"></span></label>
                          <input type="text"
                          class="form-control"
                          name="address"
                          value="{{ old('address', $getRecord->address) }}"
                          placeholder="Address"

                          >
                          <span class="text-danger">{{ $errors->first('address') }}</span>
                      </div>

                      <div class="form-group col-md-6">
                          <label">Profile_Pic<span class="text-danger"></span></label>
                          <input type="file"
                          class="form-control"
                          name="profile_pic"
                          >
                          <span class="text-danger">{{ $errors->first('profile_pic') }}</span>
                          @if (!empty($getRecord->getProfile()))
                          <img src="{{ $getRecord->getProfile()}}"
                          alt="" style="width: 100px; heigth: 100px">
                        @endif
                      </div>


                      <div class="form-group col-md-6">
                          <label">Status <span class="text-danger">*</span></label>
                          <select class="form-control"  name="status">
                              <option value="">Select a Status</option>
                              <option {{ old('status', $getRecord->status) == 0 ? 'selected' : ''}} value="0">Active</option>
                              <option {{ old('status', $getRecord->status) == 1 ? 'selected' : ''}}  value="1">Inactive</option>
                          </select>
                          <span class="text-danger">{{ $errors->first('status') }}</span>
                      </div>
                  </div>
                  <hr>
                <div class="form-group">
                  <label>Email address<span class="text-danger">*</span></label>
                  <input type="email"
                  class="form-control"
                  placeholder="Enter email"
                  name="email"
                  >
                  <span class="text-danger">{{ $errors->first('email', $getRecord->email) }}</span><span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                  <label>Password<span class="text-danger">*</span></label>
                  <input type="password"
                  class="form-control"
                  name="password"
                  placeholder="Password"
                  >
                  <p>If you want to change password, just type it here!</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>

@endsection
