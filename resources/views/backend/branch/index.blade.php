@extends('backend.layouts.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Branch</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Branch</li>
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
                <h3 class="card-title">Branch List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
              @can('branch.create')
                <!-- <a class="btn btn-success" href="{{ route('branches.create') }}"> Create New branch</a> -->
                @endcan
                <a class="btn btn-success" href="{{ route('branches.create') }}"> Create New Branch</a>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Country</th>
                    <th>Location</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($branches)
                  @php
                  $id =1;
                  @endphp
                  @foreach($branches as $key =>  $branch)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $branch->name }}</td>
                      <td>{{ $branch->state }}</td>
                      <td>{{ $branch->city }}</td>
                      <td>{{ $branch->status }}</td>
                      <td>{{ $branch->country }}</td>
                      <td>{{ $branch->location }}</td>
                    
                      <td>
                      <div class="form-group">
                       
                          <a class="btn btn-primary" href="{{route('branches.edit',$branch->id)}}">Edit</a>
                        </div>

                        <div class="form-group">
                        <form method='post' action="{{ route('branches.destroy', $branch->id) }}" onsubmit=" return confirm('Are You Sure You Want To Delete This?') ">
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
                    <th>State</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Country</th>
                    <th>Location</th>
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