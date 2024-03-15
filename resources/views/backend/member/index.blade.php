@extends('backend.layouts.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>members</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">members</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Member List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
              @can('member.create')
                <!-- <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Member</a> -->
                @endcan
                <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Member</a>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Member Name</th>
                    <th>sex</th>
                    <th>Age</th>
                    <th>Member Photo</th>
                    <th>Marital Status</th>
                    <th>Date of Birth</th>
                    <th>Country</th>
                    <th>District</th>
                    <th>Street Details</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($members)
                  @php
                  $id =1;
                  @endphp
                  @foreach($members as $key =>  $member)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $member->member_name }}</td>
                      <td>{{ $member->sex }}</td>
                      <td>{{ $member->age }}</td>
                      <td><img src="{{ $member->member_photo }}" alt=""></td>
                      <td>{{ $member->marital_status }}</td>
                      <td>{{ $member->date_of_birth }}</td>
                      <td>{{ $member->country }}</td>
                      <td>{{ $member->district }}</td>
                      <td>{{ $member->street_details }}</td>
                      <td>{{ $member->email }}</td>
                      <td>{{ $member->phone }}</td>
                      <td>
                      <div class="form-group">
                       
                          <a class="btn btn-primary" href="{{route('members.edit',$member->id)}}">Edit</a>
                        </div>

                        <div class="form-group">
                        <form method='post' action="{{ route('members.destroy', $member->id) }}" onsubmit=" return confirm('Are You Sure You Want To Delete This?') ">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                      </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.No</th>
                    <th>Member Name</th>
                    <th>sex</th>
                    <th>Age</th>
                    <th>Member Photo</th>
                    <th>Marital Status</th>
                    <th>Date of Birth</th>
                    <th>Country</th>
                    <th>District</th>
                    <th>Street Details</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection