<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public" />
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

          <div class="div_center">
            <h1 class="txt-font">Send email to {{$order->email}}</h1>

          <form action="{{ url('/send_email_notification', $order->id) }}" method="POST">
            @csrf
          <div class="input_container">
            <label for="Title">Email greetings</label>
            <input type="text" name="greeting" placeholder="Greeting start from here" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Description">Email Firstline</label>
            <input type="text" name="firstline" placeholder="The First Line" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Quality">Email Body</label>
            <input type="text" name="body" placeholder="Compose body" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="Price">Email button</label>
            <input type="text" name="button" placeholder="button" class="input_color" required>
          </div>
          <div class="input_container">
            <label for="url">Email Url Name</label>
            <input type="text" name="url" placeholder="Enter email url" class="input_color">
          </div>
          <div class="input_container">
            <label for="Description">Email Lastline</label>
            <input type="text" name="firstline" placeholder="The Last Line" class="input_color" required>
          </div>
          <div class="input_container">
            <input type="submit" class="btn btn-success" value="Send">
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
