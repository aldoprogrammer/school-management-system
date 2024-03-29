@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student</h1>
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
                            <label">Admission Number <span class="text-danger">*</span></label>
                            <input type="text"
                            class="form-control"
                            name="admission_number"
                            value="{{ old('admission_number', $getRecord->admission_number) }}"
                            placeholder="Admission Number"
                            >
                            <span class="text-danger">{{ $errors->first('admission_number') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label">Roll Number<span class="text-danger"></span></label>
                            <input type="text" value="{{ old('roll_number', $getRecord->roll_number) }}"
                            class="form-control"
                            name="roll_number"
                            placeholder="Roll Number">
                            <span class="text-danger">{{ $errors->first('roll_number') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Class <span class="text-danger">*</span></label>
                            <select class="form-control"  name="class_id">
                                <option value="">Select a Class</option>
                                @foreach ($getClass as $item)
                                    <option {{ old('class_id',
                                    $getRecord->class_id) == $item->id ?
                                    'selected' : ''}} value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('class_id') }}</span>
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
                            <label">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"
                            class="form-control"
                            name="date_of_birth"

                            placeholder="Date of Birth">
                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Caste <span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="caste"
                            value="{{ old('caste', $getRecord->caste) }}"
                            placeholder="Caste"
                            >
                            <span class="text-danger">{{ $errors->first('caste') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Religion <span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="religion"
                            value="{{ old('religion', $getRecord->religion) }}"
                            placeholder="Religion"
                            >
                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Mobile Number<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="mobile_number"
                            value="{{ old('mobile_number', $getRecord->mobile_number) }}"
                            placeholder="Mobile Number"
                            >
                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Admission Date <span class="text-danger">*</span></label>
                            <input type="date"
                            class="form-control"

                            name="admission_date"
                            value="{{ old('admission_date', $getRecord->admission_date) }}"
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
                            @if (!empty($getRecord->getProfile()))
                            <img src="{{ $getRecord->getProfile()}}"
                            alt="" style="width: 100px; heigth: 100px">
                        @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label">Blood Group<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="blood_group"
                            value="{{ old('blood_group', $getRecord->blood_group) }}"
                            placeholder="Blood Group"
                            >
                            <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Height<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="height"
                            value="{{ old('height', $getRecord->height) }}"
                            placeholder="Height"
                            >
                            <span class="text-danger">{{ $errors->first('height') }}</span>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Weight<span class="text-danger"></span></label>
                            <input type="text"
                            class="form-control"
                            name="weight"
                            value="{{ old('weight', $getRecord->weight) }}"
                            placeholder="Weight"
                            >
                            <span class="text-danger">{{ $errors->first('weight') }}</span>
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
                    value="{{ old('email', $getRecord->email) }}"
                    >
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  </div>
                  <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="text"
                    class="form-control"
                    name="password"
                    placeholder="Password"

                    >
                    <p>Do you want to change password?</p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"
                  class="btn btn-primary">
                  Update
                </button>
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
