<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style type = "text/css">
    .div_center{
      text-align: center;
      padding-top: 40px;
    }
    .h2_font{
      font-size:40px;
      padding-bottom:40px;
    }
    .input_color{
        color:black;
    }
    .center{
      margin:auto;
      width:50%;
      text-align:center;
      margin-top:30px;
      border:3px solid green;
    }
  </style>
  
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      
    @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              @if(session()->has('message'))
              <div class = "alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
                {{session()->get('message')}}

              </div>
              @endif
                <div class = "div_center">
                    <h2 class = "h2_font">Add Catagory</h2>
                    <form action = "{{url('/add_catagory')}}" method = "POST">
                        @csrf
                        <input class = "input_color" type= "text" name = "Catagory_name" placeholder = "Write catagory name">
                        <input type = "submit" class = "btn btn-primary" name = "submit" value = "Add Catagory " >
                    </form>
                </div>
                <table class = "center">
                  <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                  </tr>
                  @foreach($data as $data)
                  <tr>
                    <td>{{$data->Catagory_name}}</td>
                    <td>
                      <a class = "btn btn-danger" href = "{{url('delete_catagory',$data->id)}}" >Delete</a>
                    </td>
                  </tr>
                  @endforeach

            </div>
        </div>
    
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>