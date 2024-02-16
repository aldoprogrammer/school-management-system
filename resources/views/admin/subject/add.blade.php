@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Subject</h1>
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
                        <label>Subject Name</label>
                        <input type="text"
                        class="form-control"
                        name="name"
                        placeholder="Subject Name"
                        required>
                      </div>


                      <div class="form-group">
                        <label>Subject Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select Type</option>
                            <option value="Theory">Theory</option>
                            <option value="Practice">Practice</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
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
