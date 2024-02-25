@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
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
                        </div>
                        <div class="form-group col-md-6">
                            <label">Last Name <span class="text-danger">*</span></label>
                            <input type="text"
                            class="form-control"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            placeholder="Last name"
                            required>
                          </div>

                          <div class="form-group col-md-6">
                            <label">Admission Number <span class="text-danger">*</span></label>
                            <input type="text"
                            class="form-control"
                            name="admission_number"
                            value="{{ old('admission_number') }}"
                            placeholder="Admission Number"
                            required>
                        </div>
                        <div class="form-group col-md-6">
                            <label">Roll Number<span class="text-danger"></span></label>
                            <input type="text" value="{{ old('roll_number') }}"
                            class="form-control"
                            name="roll_number"
                            placeholder="Roll Number">
                        </div>

                        <div class="form-group col-md-6">
                            <label">Class <span class="text-danger">*</span></label>
                            <select class="form-control" required name="class_id">
                                <option value="">Select a Class</option>
                                @foreach ($getClass as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label">Gender <span class="text-danger">*</span></label>
                            <select class="form-control" required name="gender">
                                <option value="">Select a Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" value="{{ old('date_of_birth') }}"
                            class="form-control"
                            name="date_of_birth"
                            required
                            placeholder="Date of Birth">
                        </div>

                        <div class="form-group col-md-6">
                            <label">Caste <span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="caste"
                            value="{{ old('caste') }}"
                            placeholder="Caste"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Religion <span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="religion"
                            value="{{ old('religion') }}"
                            placeholder="Religion"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Mobile Number<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            placeholder="Mobile Number"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Admission Date <span class="text-danger">*</span></label>
                            <input type="date"
                            class="form-control"
                            required
                            name="admission_date"
                            value="{{ old('admission_date') }}"
                            placeholder="Admission Date"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Profile_Pic<span class="text-danger"></span></label>
                            <input type="file"
                            class="form-control"
                            name="profile_pic"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Blood Group<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="blood_group"
                            value="{{ old('blood_group') }}"
                            placeholder="Blood Group"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Height<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="height"
                            value="{{ old('height') }}"
                            placeholder="Height"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Weight<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="weight"
                            value="{{ old('weight') }}"
                            placeholder="Weight"
                            >
                        </div>

                        <div class="form-group col-md-6">
                            <label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" required name="status">
                                <option value="">Select a Status</option>
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
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
