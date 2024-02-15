@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Admin</h1>
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
                    <div class="form-group">
                        <label">Name</label>
                        <input type="text"
                        class="form-control"
                        name="name"
                        placeholder="Enter name"
                        required>
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
