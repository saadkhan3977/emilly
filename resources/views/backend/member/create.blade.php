@extends('backend.layouts.master')
@section('content')
saad
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
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
                  <form method="post" action="{{route('members.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type='text' name="name" placeholder="Name" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <strong>Email:</strong>
                                <input type='email' name="email" placeholder="Email" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <strong>password:</strong>
                                <input type='password' name="password" placeholder="password" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <strong>Phone:</strong>
                                <input type='phone' name="phone" placeholder="Phone" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <strong>Image:</strong>
                                <input type='file' name="image" placeholder="Image" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <strong>Age:</strong>
                                <input type='number' name="age" placeholder="Age" class="form-control" required>
                              </div>
                            <div class="form-group">
                              <label for="marital_status">Marital status:</label>
                              <select name="marital_status" id="marital_status" class="form-control" required>
                                <option value="">Select Marital Status</option> <!-- Default option -->
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <strong>Date of Birth:</strong>
                              <input type='date' name="date_of_birth" placeholder="Date of Birth" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <strong>Country:</strong>
                              <input type='text' name="country" placeholder="Country" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <strong>District:</strong>
                              <input type='text' name="district" placeholder="District" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <strong>Street Details:</strong>
                              <input type='text' name="street_details" placeholder="Street Details" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label for="sex">Sex:</label>
                            <select name="sex" id="sex" class="form-control" required>
                                <option value="">Select Sex</option> <!-- Default option -->
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
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