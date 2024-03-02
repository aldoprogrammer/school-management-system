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
                    <label>Admission Number</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Admission Number"
                    name="admission_number"
                    value="{{ Request::get('admission_number') }}"
                    >
                  </div>

                <div class="form-group col-md-2">
                    <label>Roll Number</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Roll Number"
                    name="roll_number"
                    value="{{ Request::get('roll_number') }}"
                    >
                  </div>

                <div class="form-group col-md-2">
                    <label>Class</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Class"
                    name="class"
                    value="{{ Request::get('class') }}"
                    >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Gender</label>
                    <select name="gender" id=""
                    class="form-control">
                    <option value="">Select a Gender</option>
                            <option {{ Request::get('gender') == 'male' ? 'selected' : ''}} value="male">Male</option>
                            <option {{ Request::get('gender') == 'female' ? 'selected' : ''}} value="male">Female</option>
                        </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Caste</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Caste"
                    name="caste"
                    value="{{ Request::get('caste') }}"
                    >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Religion</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Religion"
                    name="religion"
                    value="{{ Request::get('religion') }}"
                    >
                  </div>

                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Mobile Number"
                    name="mobile_number"
                    value="{{ Request::get('mobile_number') }}"
                    >
                  </div>


                <div class="form-group col-md-2">
                    <label>Admission Date</label>
                    <input type="date"
                    class="form-control"
                    name="admission_date"
                    value="{{ Request::get('admission_date') }}"
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
                    <label>Blood Group</label>
                    <input type="text"
                    class="form-control"
                    placeholder="Blood Group"
                    name="blood_group"
                    value="{{ Request::get('blood_group') }}"
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
                    <a href="{{ url('admin/student/list') }}" class="btn btn-success">
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
            <h1>Student List (Total Student: {{ $getRecord ? $getRecord->total() : 0 }})</h1>

          </div>
          <div class="col-sm-6 text-right">
            <a href="{{ url('admin/student/add') }}" class="btn btn-primary">
                Add New Student
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
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Profile</th>
                      <th>Name</th>
                      <th>Last Name</th>
                      <th>Class</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Birth Date</th>
                      <th>Religion</th>
                      <th>Caste</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 <tbody>
                    @if($getRecord)
    @foreach ($getRecord as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>@if (!empty($item->getProfile()))
                    <img src="{{ $item->getProfile() }}"
                    alt="" srcset="" style="height: 50px; width: 50px">
                @endif
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->last_name }}</td>
            <td>{{ $item->class_name }}</td>
            <td>{{ $item->admission_number }}</td>
            <td>{{ $item->roll_number }}</td>
            <td>{{ $item->mobile_number }}</td>
            <td>{{ date('d-m-Y', strtotime($item->admission_date))}}</td>
            <td>{{ date('d-m-Y', strtotime($item->birth_date))}}</td>
            <td>{{ $item->religion }}</td>
            <td>{{ $item->caste }}</td>
            <td>{{ $item->blood_group }}</td>
            <td>{{ $item->height }}</td>
            <td>{{ $item->weight }}</td>
            <td>{{ $item->gender }}</td>
            <td>
                @if($item->status == 0)
                    Active
                @else
                    Inactive
                @endif
            </td>
            <td>{{ $item->email }}</td>
            <td>{{ date('d-m-Y h:i A', strtotime($item->created_at))}}</td>
            <td>
                <a href="{{ url('admin/student/edit/'.$item->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('admin/student/delete/'.$item->id) }}" class="btn btn-danger">Delete</a>
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
