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
        .table_container{
          margin: auto;
          text-align: center;
          margin-top: 10px;
          border: 2px solid skyblue;
          width: 70%;
        }
        .txt_h2{
            margin: 0 auto;
            margin-top: 20px;
            text-align: center;
        }
        .header_container{
            background-color: skyblue;
        }
        .img{
            width: 100px;
            height: 100px;
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

        <h1 class="txt_h2">All Products</h1>
        <table class="table_container">
            <tr class="header_container">
                <th>Product title</th>
                <th>Description</th>
                <th>Product Quality</th>
                <th>Product Category</th>
                <th>Product price</th>
                <th>Discount_price</th>
                <th>Product image</th>
                <th>Edit</th>
                <th> Delete </th>
            </tr>
            @foreach($product as $prod)
            <tr>
                <td>{{ $prod->title }}</td>
                <td>{{ $prod->Description }}</td>
                <td>{{ $prod->Quality }}</td>
                <td>{{ $prod->Category }}</td>
                <td>{{ $prod->price }}</td>
                <td>{{ $prod->Discount_price }}</td>
                <td>
                    <img class="img" src="/product/{{ $prod->image }}">
                </td>
                <td>
                   <a class="btn btn-success" href="{{ url('edit_product', $prod->id) }}">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product')" 
                    href="{{ url('delete_product', $prod->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
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
