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
              <form action="" method="POST">
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
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label">Class <span class="text-danger">*</span></label>
                            <select class="form-control" required name="gender">
                                <option value="">Select a Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label">Date of Birth<span class="text-danger"></span></label>
                            <input type="date" value="{{ old('date_of_birth') }}"
                            class="form-control"
                            name="date_of_birth"
                            placeholder="Date of Birth">
                        </div>

                    </div>






                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email"
                    class="form-control"
                    placeholder="Enter email"
                    name="email"
                    required>
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
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
