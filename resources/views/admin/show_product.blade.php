<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  <style type = "text/css">
    .center{
        margin:auto;
        width:50%;
        border:2px solid green;
        text-align:center;
        margin-top: 40px
    }
    .font_size{
        text-align: center;
        font-size:40px;
        padding-top:20px;
    }
    .img_size{
        width:200px;
        height:100px
    }
    .first_row_color{
        background: #1A2130;
    }
    .frow_design{
        padding:30px;
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
                <h2 class = font_size>All Products</h2>
                <table class = "center">
                    <tr class = "first_row_color">
                        <th class = "frow_design">Product Title</th>
                        <th class = "frow_design">Description</th>
                        <th class = "frow_design">Catagory</th>
                        <th class = "frow_design">Quantity</th>
                        <th class = "frow_design">Price</th>
                        <th class = "frow_design">Discount Price</th>
                        <th class = "frow_design">Product Image</th>
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->descrpition}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discout_price}}</td>
                        <td><img class = "img_size" src = "/product/{{$product->image}}"></td>

                    </tr>
                    @endforeach
                </table>
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