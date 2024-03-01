@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1302.32px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">


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
              <div class="card-body p-0">
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
            <td>{{ $loop->iteration }}</td>
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
