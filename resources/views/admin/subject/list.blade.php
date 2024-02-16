@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1302.32px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Search Data</h3>
                </div>
                <form action="" method="get">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                          <label>Subject Name</label>
                          <input type="text"
                          class="form-control"
                          name="name"
                          placeholder="Enter name"
                          value="{{ Request::get('name') }}"
                          >
                        </div>

                        <div class="form-group">
                            <label>Subject Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select Type</option>
                                <option {{ (Request::get('type') == "Theory") ? 'selected' : ''}} value="Theory">Theory</option>
                                <option {{ (Request::get('type') == "Practice") ? 'selected' : ''}} value="Practice">Practice</option>
                            </select>
                          </div>

                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <input type="date"
                        class="form-control"
                        name="date"
                        value="{{ Request::get('date') }}"
                        >
                      </div>
                    <div class="form-group col-md-3" style="margin-top: 30px">
                        <button class="btn btn-primary">
                            Search
                        </button>
                        <a href="{{ url('admin/subject/list') }}" class="btn btn-success">
                            Reset
                        </a>
                    </div>
                </div>
                  </div>
                  <!-- /.card-body -->


                </form>
              </div>

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject List</h1>

          </div>
          <div class="col-sm-6 text-right">
            <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">
                Add New Subject
            </a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            @include('_message')
            <!-- /.card -->

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">Subject List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Subject Name</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>

                    @foreach ($getRecord as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                @if($item->status == 0)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>{{ $item->created_by_name }}</td>
                            <td>{{ date('d-m-Y h:i A', strtotime($item->created_at))}}</td>
                            <td>
                                <a href="{{ url('admin/subject/edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/subject/delete/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                 </tbody>
                </table>

                <div class="float-right mt-4">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
