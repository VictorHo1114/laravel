<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')

  <style type = "text/css">
    .div_center{
      text-align: center;
      padding-top: 40px;
    }
    .font_size{
      font-size:40px;
      padding-bottom:40px;
    }
    .text_color{
        color:black;
    }
    .center{
      margin:auto;
      width:50%;
      text-align:center;
      margin-top:30px;
      border:3px solid green;
    }
    label{
      display:inline-block;
      width:200px
    }
    .div_design{
      padding-bottom: 15px;
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
          <h1 class = "font_size">Add Product</h1>

          <form action = "{{url('/add_product')}}" method = "POST" enctype = "multipart/form-data">
            @csrf
          <div class = "div_design">
          <label > Product Title: </label>
          <input type="text" class = "text_color" name = "title" placeholder = "Write a Title">
          </div>

          <div class = "div_design">
          <label > Product Description: </label>
          <input type="text" class = "text_color" name = "descrpition" placeholder = "Write a  Description">
          </div>

          <div class = "div_design">
          <label > Product Price: </label>
          <input type="number" class = "text_color" name = "price" placeholder = "Write a Price">
          </div>

          <div class = "div_design">
          <label > Discount Price: </label>
          <input type="number" class = "text_color" name = "discout_price" placeholder = "Write a Discount_Price" >
          </div>

          <div class = "div_design">
          <label > Product Quantity: </label>
          <input type="number" min = "0" class = "text_color" name = "quantity" placeholder = "Write a Quantity">
          </div>
          
          <div class = "div_design">
          <label > Product Catagory: </label>
          <select class = "text_color" name = "catagory" >
          <option value="selected" >Add a catagory here</option>  
          @foreach($catagory as $catagory)
          <option>{{$catagory->Catagory_name}}</option>\
          @endforeach
          </select>
          </div>

          <div class = "div_design">
          <label > Product Image: </label>
          <input type="file"  name = "image">
          </div>

          <div>
            <input type="submit"class = "btn btn-primary" value = "Add Product" >
          </div>

          </form>

        </div>

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