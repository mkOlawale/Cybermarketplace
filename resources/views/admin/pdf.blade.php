<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order details</title>
    <style>
        .center{
            padding-left: 40%;
        }
        .txt-red{
            color: red;
            font-weight: bold;
        
        }
        .txt-blue{
            color: blue;
            font-weight: bold;
            font-family: sans serif;
        }
    </style>
</head>
<body>
    <div class="center">
        <p class="txt-red"> Customer Name cybershop:  {{ $order->name}}</p>

        <p class="txt-blue"> Email :  {{ $order->email}}</p>

        <p> Phone :  {{ $order->phone}}</p>

        <p> Customer Address :  {{ $order->address}}</p>

        <p> Customer User_id :  {{ $order->user_id}}</p>

        <p> Product Name :  {{ $order->product_title}}</p>

        <p> Product Price :  {{ $order->price}}</p>

        <p> Product Quantity :  {{ $order->quantity}}</p>

        <p> Product_id :  {{ $order->product_id}}</p>

        <div style="display: flex;">
            Product Image:
        <img src="product/{{$order->image}}" alt="The product image" width="100" height="100">
        </div>

        <p> Product Delivery_status :  {{ $order->delivery_status}}</p>

        <p> Product Payment_status :  {{ $order->payment_status}}</p>
    </div>
</body>
</html>