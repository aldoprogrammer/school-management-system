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
                          <label>Name</label>
                          <input type="text"
                          class="form-control"
                          name="name"
                          placeholder="Enter name"
                          value="{{ Request::get('name') }}"
                          >
                        </div>
                    <div class="form-group col-md-3">
                      <label>Email address</label>
                      <input type="text"
                      class="form-control"
                      placeholder="Enter email"
                      name="email"
                      value="{{ Request::get('email') }}"
                      >
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
                        <a href="{{ url('admin/parent/list') }}" class="btn btn-success">
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
            <h1>Parents List (Total Parents: {{ $getRecord ? $getRecord->total() : 0 }})</h1>

          </div>
          <div class="col-sm-6 text-right">
            <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">
                Add New Parents
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
                <h3 class="card-title">Parents List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Profile Picture</th>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Occupation</th>
                      <th>Status</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>
                    @if($getRecord)
    @foreach ($getRecord as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>@if (!empty($item->getProfile()))
                <img src="{{ $item->getProfile() }}"
                alt="" srcset="" style="height: 50px; width: 50px">
            @endif
        </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->gender }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->occupation }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ date('d-m-Y h:i A', strtotime($item->created_at))}}</td>
            <td>
                <a href="{{ url('admin/parent/edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('admin/parent/delete/'.$item->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
@endif

                 </tbody>
                </table>
                @if($getRecord)
                <div class="float-right mt-4">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            @endif

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
