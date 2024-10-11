<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\product;

use App\Models\cart;

use App\Models\order;

use App\Models\comment;

use App\Models\reply;

use Session;

use Stripe;

class homecontroller extends Controller
{
    public function index(){

        $product = product::paginate(10);

        $comment = comment::orderby('id', 'desc')->get();

        $reply = reply::orderby('id', 'desc')->get();

        return view('home.homepage', compact('product', 'comment', 'reply'));
    }
    public function redirect(){

        $usertype = Auth::User()->userType;

        if($usertype === '1'){

            $product = product::all()->count();

            $user = user::all()->count();

            $orders = order::all();

            $initial_price = 0;

            foreach($orders as $order){

                $initial_price = $initial_price + $order->price;

            }
            $order = order::all()->count();

            $delivered_order = order::where('delivery_status', '=', 'delivered')->get()->count();

            $sales = order::where('payment_status', '=', 'paid')->get();
           
            return view('admin.home', compact('product', 'user', 'order', 'delivered_order', 'initial_price'));
        }
        else
        {
            $product = product::paginate(10);

            $comment = comment::orderby('id', 'desc')->get();

            $reply = reply::orderby('id', 'desc')->get();

            return view('home.homepage', compact('product', 'comment', 'reply'));
        }
    }

    public function ProductsDetails($id){

        $product = product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function addCart(Request $request, $id){

        $user = Auth::user();

        $product = product::find($id);

        $cart = new cart;

        if(Auth::user()){
           
            $cart->name = $user->name;

            $cart->email = $user->email;

            $cart->phone = $user->phone;

            $cart->address = $user->address;

            $cart->product_title = $product->title;

            $cart->image = $product->image;

            if($product->Discount_price != null){

                 $cart->price = $product->Discount_price * $request->quantity;

            }else{

                $cart->price = $product->price * $request->quantity;

            }
            $cart->quantity = $request->quantity;

            $cart->user_id = $user->id;

            $cart->product_id = $product->id;

            $cart->save();

            return redirect()->back();
        }
        else{

            return redirect('login');
        }
    }

    public function showCart(){
      

        if(Auth::id()){

            $id = Auth::user()->id;

            $carts = cart::where('user_id', '=', $id)->get();

            return view('home.cart', compact('carts'));
        }
        else{

            return redirect('login');
        }
    }
    
    public function DeleteCart($id){

        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cashDelivery(){
        $user = Auth::user();
        $user_id = $user->id;

        $datas = cart::where('user_id', '=', $user_id)->get();

        foreach($datas as $data){
            $order = new order;

            $order->name = $data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;

            $order->image = $data->image;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->product_id = $data->product_id;

            $order->payment_status = "Pay on Delivery";

            $order->delivery_status = "Processing";

            $order->save();

            $cartid = $data->id;
            // just want to write something

            $cart = cart::find($cartid);

            $cart->delete();
            
        }

        return redirect()->back()->with('message', ' hello Your order is successfuly recieved and we are delivering it as soon as possible');
    }
    public function stripe($totalprice){
        // stripe implemetation start from here
        return view('home.stripe', compact('totalprice'));

    }
    public function stripePost(Request $request, $totalprice)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Payment successfully done" 

        ]);

        $user = Auth::user();

        $user_id = $user->id;

        $datas = cart::where('user_id', '=', $user_id)->get();

        foreach($datas as $data){
            $order = new order;

            $order->name = $data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;
            
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;

            $order->image = $data->image;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->product_id = $data->product_id;

            $order->payment_status = "Paid";

            $order->delivery_status = "Processing";

            $order->save();

            $cartid = $data->id;

            $cart = cart::find($cartid);

            $cart->delete();
            
        }
      

        Session::flash('success', 'Payment successful!');


        return back();

    }

    public function cancelOrder(){

     if(Auth::id()){

        $user = Auth::user();

        $userid = $user->id;

        $order = order::where('user_id', '=', $userid)->get();

        return view('home.order', compact('order'));
     }
     else{
        return redirect('login');
     }
    }

    public function cancelOrderBtn($id){

        $order = order::find($id);

        $order->delivery_status = "You canceled the order";

        $order->save();

        return redirect()->back();
    }

    public function addComment(Request $request){
        
        if(Auth::id()){

            $comment = new comment;

            $comment->name = Auth::user()->name;

            $comment->user_id = Auth::user()->id;

            $comment->comments = $request->comment;

            $comment->save();
            
            return redirect()->back();
    
        }
        else{

            return redirect('login');

        }
    }
    
    public function replyComments(Request $request){

        if(Auth::id()){

            $reply = new reply;

            $reply->name = Auth::user()->name;

            $reply->user_id = Auth::user()->id;

            $reply->comment_id = $request->commentId;

            $reply->reply = $request->reply;

            $reply->save();
            
            return redirect()->back();

        }
        else{

            return redirect('login');
            
        }
    }
}
