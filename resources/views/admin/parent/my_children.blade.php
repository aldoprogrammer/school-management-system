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
              <div class="form-group col-md-2">
                  <label>Name</label>
                  <input type="text"
                  class="form-control"
                  name="name"
                  placeholder="Enter name"
                  value="{{ Request::get('name') }}"
                  >
                </div>
                <div class="form-group col-md-2">
                    <label>Last Name</label>
                    <input type="text"
                    class="form-control"
                    name="last_name"
                    placeholder="Last Name"
                    value="{{ Request::get('last_name') }}"
                    >
                  </div>
            <div class="form-group col-md-2">
              <label>Email address</label>
              <input type="text"
              class="form-control"
              placeholder="Enter email"
              name="email"
              value="{{ Request::get('email') }}"
              >
            </div>


              <div class="form-group col-md-2">
                <label>Gender</label>
                <select name="gender" id=""
                class="form-control">
                <option value="">Select a Gender</option>
                        <option {{ Request::get('gender') == 'male' ? 'selected' : ''}} value="male">Male</option>
                        <option {{ Request::get('gender') == 'female' ? 'selected' : ''}} value="female">Female</option>
                    </select>
              </div>


              <div class="form-group col-md-2">
                <label>Phone</label>
                <input type="text"
                class="form-control"
                placeholder="Phone"
                name="mobile_number"
                value="{{ Request::get('mobile_number') }}"
                >
              </div>


            <div class="form-group col-md-2">
                <label>Created Date</label>
                <input type="date"
                class="form-control"
                name="date"
                value="{{ Request::get('date') }}"
                >
              </div>

              <div class="form-group col-md-2">
                <label>Occupation</label>
                <input type="text"
                class="form-control"
                placeholder="Occupation"
                name="occupation"
                value="{{ Request::get('occupation') }}"
                >
              </div>

              <div class="form-group col-md-2">
                <label>Address</label>
                <input type="text"
                class="form-control"
                placeholder="Address"
                name="address"
                value="{{ Request::get('address') }}"
                >
              </div>




              <div class="form-group col-md-2">
                <label>Status</label>
                <select name="status" id=""
                class="form-control">
                <option value="">Select a Status</option>
                        <option {{ Request::get('status') == 100 ? 'selected' : ''}} value="100">Active</option>
                        <option {{ Request::get('status') == 1 ? 'selected' : ''}} value="1">Inactive</option>
                    </select>
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
            <h1>Parents Students List (Total Parents: {{ $getRecord ? $getRecord->total() : 0 }})</h1>

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
                <h3 class="card-title">Parents Students List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto">
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
            <td>{{ $item->mobile_number }}</td>
            <td>{{ $item->occupation }}</td>
            <td>
                @if($item->status == 0)
                    Active
                @else
                    Inactive
                @endif
            </td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ date('d-m-Y h:i A', strtotime($item->created_at))}}</td>
            <td style="min-width: 150px">
                <a href="{{ url('admin/parent/edit/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ url('admin/parent/delete/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                <a href="{{ url('admin/parent/my-children/'.$item->id) }}" class="btn btn-success btn-sm mt-1">My Children</a>
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
