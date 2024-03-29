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
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">
    
        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                  @if($branches)
                  <form method="post" action="{{ route('branches.update', $branches->id) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type='text' name="name" value="{{$branches->name}}" placeholder="Name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <strong>Country:</strong>
                                <input type='text'  value="{{$branches->country}}" name="country" placeholder="Country" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <strong>State:</strong>
                                <input type='text' value="{{$branches->state}}" name="state" placeholder="State" class="form-control" required>
                            </div>

                           <div class="form-group">
                                <strong>City:</strong>
                                <input type='text' value="{{$branches->city}}" name="city" placeholder="City" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <strong>Location:</strong>
                                <input type='text' name="location"  value="{{$branches->location}}" placeholder="Location" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Status</option> <!-- Default option -->
                                    <option value="active" {{( $branches->status == 'active') ? 'selected' : null}}>Active</option>
                                    <option value="unactive" {{( $branches->status == 'unactive') ? 'selected' : null}}>InActive</option>
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
                  @endif
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
