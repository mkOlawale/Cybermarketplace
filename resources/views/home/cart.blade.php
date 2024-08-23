<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
         table{
            margin-top: 30px;
            margin: auto;
            padding: 10px;
         }
         table, th, td{
            border: 1px solid #333;
            padding: 20px;
         }
         img{
            max-width: 100px;
            max-height: 100px;
         }
         .center{
            text-align: center;
            padding: 10px;
         }
         .container{
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
         }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
       
         @if(session()->has('message'))
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{ session()->get('message') }}
            </div>
            @endif

      <div class="contain">
        <table>
            <tr>
                <th>Product title</th>
                <th>Product price</th>
                <th>Product quantity</th>
                <th>Product image</th>
                <th>Action</th>
            </tr>
            <?php $totalprice = 0 ?>
            @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->product_title }}</td>
                <td>{{ $cart->price }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>

                <img src="/product/{{ $cart->image }}" alt="">

                </td>
                <td>
                  <a href="{{ url('remove_cart', $cart->id) }}" onclick="return confirm('Are you sure to remove this product')" 
                  class="btn btn-danger">
                   Remove
                  </a>
                </td>
            </tr>
            <?php $totalprice = $totalprice + $cart->price ?>
            @endforeach
        </table>
             
            <div>
              <h1 class="center"> Total = ${{$totalprice}}</h1>
            </div>
      </div>

      <div class="container">
         <h1>Proceed to checkout</h1>
         <a href="{{ url('cash_delivery') }}" class="btn btn-danger" >Cash on delivery</a>
         <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger" >Pay with Cards</a>
      </div>
      </div>
  

<!-- other section start from here -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Developed by Olawale</a><br>
         
            By <a href="https://themewagon.com/" target="_blank">WhaleBrain</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>