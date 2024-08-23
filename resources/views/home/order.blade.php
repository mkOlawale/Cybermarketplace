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
            margin: 0 auto;
        }
        table, tr, th, td{
            padding: 10px;
            border: 1px solid #333;
        }
        .img{
            max-width: 100px;
            max-height: 50px;
        }
      </style>
   </head>
   <body>
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
     <table>
        <tr>
            <th>Product title</th>
            <th>quality</th>
            <th>price</th>
            <th>payment_status</th>
            <th>delivery_status</th>
            <th>image</th>
             <th>Action</th>
     </tr>
     @foreach($order as $order)
    <tr>
        <td>{{$order->product_title}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->payment_status}}</td>
        <td>{{$order->delivery_status}}</td>
        <td>
            <image class="img" src="product/{{$order->image}}" />
        </td>
        
        <td>
            @if($order->delivery_status == "processing")
            <a href="{{url('cancel_order', $order->id) }}" onclick="return confirm('Are you sure, you want to cancel this order')" class="btn btn-primary">Cancel Order</a>

            @else
            <p style="color: red;">Not Allowed</p>
            @endif
        </td>
    </tr>
    @endforeach
   </table>
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