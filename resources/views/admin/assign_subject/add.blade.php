@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Assign Subject to Class</h1>
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
                        <label>Class Name</label>
                        <select name="class_id" class="form-control">
                            <option value="">Select Class</option>
                            @foreach ($getClass as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                      </div>

                      <div class="form-group">
                        <label>Subject Name</label>
                            @foreach ($getSubject as $item)
                            <div>
                                <label>
                                    <input type="checkbox" name="subject_id[]" value="{{ $item->id }}"> {{ $item->name }}
                                </label>
                            </div>
                            @endforeach

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
