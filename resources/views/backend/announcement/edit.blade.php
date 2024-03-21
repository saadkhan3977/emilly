@extends('backend.layouts.master')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">announcement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">
    
        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                
                  <form method="post" action="{{ route('announcement.update', $announcement->id) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                    
                    <div class="col-sm-12">
                    <div class="form-group">
                    <label for="branch_id">Branch Id:</label>
                    <select name="branch_id" id="branch_id" class="form-control" required>
                        <option value="">Select Branch Id</option> <!-- Default option -->
                    @foreach($branches as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        <option value="{{$row->id}}">{{$row->country}}</option>
                        <option value="{{$row->id}}">{{$row->state}}</option>
                        <option value="{{$row->id}}">{{$row->city}}</option>
                        <option value="{{$row->id}}">{{$row->location}}</option>
                        <option value="{{$row->id}}">{{$row->status}}</option>
                    @endforeach
                    </select>
                </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Start Time:</strong>
                        <input type='time' name="start_time" placeholder="Start Time" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <strong>End Time:</strong>
                        <input type='time' name="end_time" placeholder="End Time" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Start Date:</strong>
                        <input type='date' name="start_date" placeholder="Start Date" class="form-control" required>
                    </div>
                    </div>

                    <div class="col-sm-6">
                    <div class="form-group">
                        <strong>End Date:</strong>
                        <input type='date' name="end_date" placeholder="End Date" class="form-control" required>
                    </div>
                    </div>
                        <div class="col-sm-12">
                      <div class="form-group">
                          <strong>Message:</strong>
                          <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Message" required onfocus="if(this.value=='Message')this.value='';">Message</textarea>
                      </div>
                  </div>

                                             
                </div>   
                   </div>
                  </div>  
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
                  </form>
               
                  </div>
              </div> 
          </div>   
        </div>
    </div>
</section>
  </div>
  <script>

$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": []
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
 
 var APP_URL = {!! json_encode(url('/')) !!}



 
</script>
<style>
  .form-check-input{
    border-radius: 0 !important;
    height: 20px;
    width: 20px;
    margin:0;
  }
  
  .form-group strong{
    margin: 0 0 10px;
    width: fit-content;
    display: block;
  }

  .my-txt-box{
    padding: 0 0 10px;
  }
  
  .my-label{
    padding-left: 30px;
    text-transform:capitalize;
  }
  </style>


@endsection
