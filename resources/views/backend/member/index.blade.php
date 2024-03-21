@extends('backend.layouts.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Members</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Members</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    @if(Session::has('error'))
  <p class="alert alert-info">{{ Session::get('error') }}</p>
  @endif

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
                    <th>Name</th>
                    <th>Email</th>

                 
                    <th>Phone</th>
                    <th>Image</th>

                    <th>Age</th>
                    <th>Marital Status</th>
                    <th>Date of Birth</th>

                    <th>Country</th>
                    <th>District</th>
                    <th>Street Details</th>

                    <th>sex</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($users)
                  @php
                  $id =1;
                  @endphp
                  @foreach($users as $key =>  $user)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>

                     
                      <td>{{ $user->phone }}</td>
                      <td><img src="/upload/member/{{$user->image}}" alt="" width='100'></td>

                      <td>{{ $user->age }}</td>
                      <td>{{ $user->marital_status }}</td>
                      <td>{{ $user->date_of_birth }}</td>

                      <td>{{ $user->country }}</td>
                      <td>{{ $user->district }}</td>
                      <td>{{ $user->street_details }}</td>

                      <td>{{ $user->sex }}</td>
                      <td>
                      <div class="form-group">
                          <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                        </div>

                        <div class="form-group">
                        <form method='post' action="{{ route('users.destroy', $user->id) }}" onsubmit=" return confirm('Are You Sure You Want To Delete This?') ">
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
                    <th>Name</th>
                    <th>Email</th>

               
                    <th>Phone</th>
                    <th>Image</th>

                    <th>Age</th>
                    <th>Marital Status</th>
                    <th>Date of Birth</th>

                    <th>Country</th>
                    <th>District</th>
                    <th>Street Details</th>

                    <th>sex</th>
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