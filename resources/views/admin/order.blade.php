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
       img{
        max-width: 100px;
        max-height: 100px;
       }
       h1{
        font-size: 25px;
        font-weight: bold;
        text-align: center;
        padding-bottom: 25px;
       }
       table, th, td{
        padding: 1px;
        border: 1px solid #333;
       }

       .th_header{
        background-color: blue;
        color: #fff;
        font-weight: bold;
       }
       .txt_green{
        color: green;
       }
       table{
        margin-left: -20px;
       }
       th, td{
        max-width: 100px;
       }
       .searchForm{
        margin: 0 auto;
        padding-left : 35%;
       }
       .INPUT_STYLE{
        color: black;
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

          <h1>All Order</h1>

          <form action="{{ url('search_route') }}" class="searchForm" method="get">
            @csrf
            <input type="text" name="searchText" class="INPUT_STYLE" placeholder="Enter Your search">
            <input type="submit">
          </form>

          <table>
            <tr>
                <th class="th_header">Name</th>
                <th class="th_header">Email</th>
                <th class="th_header">Phone</th>
                <th class="th_header">Address</th>
                <th class="th_header">title</th>
                <th class="th_header">price</th>
                <th class="th_header">Quantity</th>
                <th class="th_header">payment_status</th>
                <th class="th_header">delivery_status</th>
                <th class="th_header">Image</th>
                <th class="th_header">Delievered</th>
                <th class="th_header">PDF</th>
                <th class="th_header">send email</th>
            </tr>
            @forelse($orders as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->product_title}}</td>
                <td>${{$order->price}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>

                <image src="/product/{{$order->image}}" />

                </td>
                <td>
                  @if($order->delivery_status == 'Processing')
                  <a href="{{ url('delivered', $order->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure this product has been delivered')">Delivered</a>

                  @else

                  <p class="txt_green">Delievered</p>

                  @endif
                </td>
                <td>
                  <a href="{{ url('download_pdf', $order->id) }}" class="btn btn-danger">Download pdf</a>
                </td>

                <td>
                  <a href="{{ url('send_email', $order->id) }}" class="btn btn-secondary">send email</a>
                </td>
            </tr>
            @empty

            <tr>
              <td rowspan="1">No data found</td>
            </tr>

            @endforelse
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
