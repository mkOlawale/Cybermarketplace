<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cybershopping Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        .div_center{
            text-align: center;
            padding-bottom: 40px;
        }
        .txt-font{
          font-size: 30px;
          padding-bottom: 40px;
        }
        .input_container{
          padding-bottom: 15px;
        }
        .input_color{
          color: #333;
        }
        label{
          display: inline-block;
          width: 200px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
     @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{ session()->get('message') }}
            </div>
            @endif
          <div class="div_center">
            <h1 class="txt-font">Add Products</h1>

          <form action="{{ url('/add_products') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="input_container">
            <label for="Title">Title</label>
            <input type="text" name="title" placeholder="Enter the title" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Description">Product Description</label>
            <input type="text" name="Description" placeholder="Write Description" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Quality">Product Quantity</label>
            <input type="number" name="Quality" placeholder="Quantity" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Price">Product Price</label>
            <input type="number" name="price" placeholder="Product price" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Discount_price">Discount Price</label>
            <input type="number" name="Discount_price" placeholder="Discount Price" class="input_color">
          </div>
          <div class="input_container">
            <label for="category">Product Category</label>
                <select name="Category" class="input_color" required>
                  <option value="" selected="">Select a Category</option>
                  @foreach($category as $cat)
                  <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                  @endforeach
                </select>
          </div>
          <div class="input_container">
            <label for="image">Product Image</label>
            <input type="file" name="image">
          </div>
          <div class="input_container">
            <input type="submit" class="btn btn-success" value="Add Product">
          </div>

        </form>
          </div>
       

          </div>
        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
