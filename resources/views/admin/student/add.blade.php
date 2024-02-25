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
                            <label">Admission Number <span class="text-danger">*</span></label>
                            <input type="text"
                            class="form-control"
                            name="admission_number"
                            value="{{ old('admission_number') }}"
                            placeholder="Admission Number"
                            required>
                            <span class="text-danger">{{ $errors->first('admission_number') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label">Roll Number<span class="text-danger"></span></label>
                            <input type="text" value="{{ old('roll_number') }}"
                            class="form-control"
                            name="roll_number"
                            placeholder="Roll Number">
                            <span class="text-danger">{{ $errors->first('roll_number') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Class <span class="text-danger">*</span></label>
                            <select class="form-control" required name="class_id">
                                <option value="">Select a Class</option>
                                @foreach ($getClass as $item)
                                    <option {{ old('class_id') == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('class_id') }}</span>
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
                            <label">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" value="{{ old('date_of_birth') }}"
                            class="form-control"
                            name="date_of_birth"
                            required
                            placeholder="Date of Birth">
                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Caste <span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="caste"
                            value="{{ old('caste') }}"
                            placeholder="Caste"
                            >
                            <span class="text-danger">{{ $errors->first('caste') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Religion <span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="religion"
                            value="{{ old('religion') }}"
                            placeholder="Religion"
                            >
                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Mobile Number<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            placeholder="Mobile Number"
                            >
                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
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
                            <span class="text-danger">{{ $errors->first('admission_date') }}</span>
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
                            <label">Blood Group<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="blood_group"
                            value="{{ old('blood_group') }}"
                            placeholder="Blood Group"
                            >
                            <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Height<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="height"
                            value="{{ old('height') }}"
                            placeholder="Height"
                            >
                            <span class="text-danger">{{ $errors->first('height') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Weight<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="weight"
                            value="{{ old('weight') }}"
                            placeholder="Weight"
                            >
                            <span class="text-danger">{{ $errors->first('weight') }}</span>
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
