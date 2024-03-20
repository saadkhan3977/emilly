@extends('backend.layouts.master')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Announcement</li>
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
                <h3 class="card-title">Announcement List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
              @can('branch.create')
                <!-- <a class="btn btn-success" href="{{ route('branches.create') }}"> Create New branch</a> -->
                @endcan
                <a class="btn btn-success" href="{{ route('announcement.create') }}"> Create New Announcement</a>
                </div>
             
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    
                    <th>Branch</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($announcements)
                  @php
                  $id =1;
                  @endphp
                  @foreach($announcements as $key =>  $announcement)
                  <tr>
                      <td>{{ $key+1 }}</td>
                    
                      <td>{{ $announcement->branches->name }}</td>
                      <td>{{ $announcement->start_time }}</td>
                      <td>{{ $announcement->end_time }}</td>
                      <td>{{ $announcement->start_date }}</td>
                      <td>{{ $announcement->end_date }}</td>
                      <td>{{ $announcement->message }}</td>
                    
                      <td>
                      <div class="form-group">
                  
                     @if($announcement)
                          <a class="btn btn-primary" href="{{route('announcement.edit',$announcement->id)}}">Edit</a>
                      @endif
                        </div>

                        <div
                         class="form-group">
                        <form method='post' action="{{ route('announcement.destroy', $announcement->id) }}" onsubmit=" return confirm('Are You Sure You Want To Delete This?') ">
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
                
                    <th>Branch</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Message</th>
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