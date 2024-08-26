<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category; 

use App\Models\product;

use App\Models\order;

use PDF;

use Notification;

use App\Notifications\SendEmailNotification;

class admincontroller extends Controller
{
    public function viewCategory(){

        $data = category::all();

        return view('admin.category', compact('data'));
        
    }

    public function addCategory(Request $request){

        $data = new category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category is added succesfully');
    }
    public function DeleteCategory($id){

        $data = category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'This Category is been deleted succesfully');
    }

    public function viewProducts(){

        $category = category::all();

        return view('admin.products', compact('category'));
    }

    public function addProducts(Request $request){
        $product = new product;

        $product->title = $request->title;

        $product->Description = $request->Description;

        $product->Quality = $request->Quality;

        $product->Category = $request->Category;

        $product->price = $request->price;

        $product->Discount_price = $request->Discount_price;

        $image = $request->image;

        $image_name = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $image_name);

        $product->image = $image_name;

        $product->save();

        return redirect()->back()->with('message', 'Product is being added succesfully, No stress! shogbo omo iya mi!!');
    }

    public function showProducts(){

        $product = product::all();

        return view('admin.show_product', compact('product'));
    
    }

    public function deleteProducts($id){

        $product = product::find($id);

        $product->delete();
        
        return redirect()->back()->with('message'. 'This product is being deleted successfully');
    }
    public function editProducts($id){

        $product = product::find($id);

        $category = category::all();
        
        return view('admin.update', compact('product', 'category'));
    }

    public function updateProducts(Request $request, $id){

        $product = product::find($id);

        $product->title = $request->title;

        $product->Description = $request->Description;

        $product->Quality = $request->Quality;

        $product->Category = $request->Category;

        $product->price = $request->price;

        $product->Discount_price = $request->Discount_price;

        $image = $request->image;

        if($image){
            
          $image_name = time().'.'.$image->getClientOriginalExtension();

         $request->image->move('product', $image_name);

         $product->image = $image_name;

        }

        $product->save();

        return redirect()->back()->with('message', 'Product updated succesfully');
    }

    public function order(){

        $orders = order::all();

        return view('admin.order', compact('orders'));
    }

    public function delivered($id){
        $delivers = order::find($id);

        $delivers->delivery_status = "delivered";

        $delivers->payment_status = "paid";

        $delivers->save();

        return redirect()->back();
    }

    public function pdf($id){
        $order = order::find($id);

        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->download('order_details.pdf');
    }
    public function sendEmail($id){

        $order = order::find($id);

        return view('admin.send_email', compact('order'));
    }
    public function sendEmailNotification(Request $request, $id){

        $order = order::find($id);
// there is a little confusion
// just gerring started here
        $details = [
            'greeting' => $request->greeting,

            'firstline' => $request->firstline,

            'body' => $request->body,

            'button' => $request->button,

            'url' => $request->url,

            'lastline' => $request->lastline,
        ];

        Notification::Send($order, new SendEmailNotification($details));

        return redirect()->back();

    }
    public function search(Request $request){

        $searchText = $request->searchText;

        $orders = order::where('name', 'LIKE', "%$searchText%")

            ->orWhere('phone', 'LIKE', "%$searchText%")

            ->orWhere('address', 'LIKE', "%$searchText%")

            ->orWhere('product_title', 'LIKE', "%$searchText%")

            ->orWhere('payment_status', 'LIKE', "%$searchText%")->get();

        return view('admin.order', compact('orders'));
    }
    // hello world from here i think, i've tried my fucking best on this project it only remain small like this.
}

