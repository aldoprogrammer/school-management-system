@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Parent</h1>
          </div>
        </div>
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
                <h3 class="card-title">Input Data</h3>
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
                            value="{{ old('name') }}"
                            placeholder="First name"
                            required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label">Last Name <span class="text-danger">*</span></label>
                            <input type="text"
                            class="form-control"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            placeholder="Last name"
                            required>
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                          </div>

                          <div class="form-group col-md-6">
                            <label">Gender <span class="text-danger">*</span></label>
                            <select class="form-control" required name="gender">
                                <option value="">Select a Gender</option>
                                <option {{ old('gender') == 'male' ? 'selected' : ''}} value="male">Male</option>
                                <option {{ old('gender') == 'female' ? 'selected' : ''}} value="female">Female</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Occupation<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="occupation"
                            value="{{ old('occupation') }}"
                            placeholder="Occupation"
                            >
                            <span class="text-danger">{{ $errors->first('occupation') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Mobile Number<span class="text-danger">*</span></label>
                            <input type="text"
                            class="form-control"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            placeholder="Mobile Number"
                            required
                            >
                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Address<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="Address"
                            required
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
                        </div>


                        <div class="form-group col-md-6">
                            <label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" required name="status">
                                <option value="">Select a Status</option>
                                <option {{ old('status') == 0 ? 'selected' : ''}} value="0">Active</option>
                                <option {{ old('status') == 1 ? 'selected' : ''}}  value="1">Inactive</option>
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
                    required>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  </div>
                  <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                    required>
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
