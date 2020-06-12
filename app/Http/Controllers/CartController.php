<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Cart;
use App\Customer;
use App\Product;
use App\Bill;
use App\BillDetails;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->productId);
        Cart::add($product->id, $product->name, $product->price, $request->quantity,  array('img' => $product->image));
        return back()->with('success',"$product->name has successfully beed added to the shopping cart!");;
    }

    public function cart(){
        $params = [
            'title' => 'Shopping Cart Checkout',
        ];

        return view('home.carc')->with($params);
    }

    public function scart(){
        $params = [
            'title' => 'Shopping Cart Checkout',
        ];

        return view('home.shoppingcart')->with($params);
    }

    public function clear(){
        Cart::clear();

        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");;
    }


    public function remove($id){
            Cart::remove($id);
            return back()->with('success',"Đã xóa mặt hàng");;
    }


    public function send_mail(){
        $to_name = "hoang nguyen nguyen";
        $to_email = "hoangnguyenn3333@gmail.com";//send to this email

        $email= Cart::getContent();

        // dd($email);

        $data = array( "product"=>$email ); //body of mail.blade.php

        Mail::send('home.carc',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test mail nhé');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });

        return redirect()->route('home.index');


    }

    public function store(Request $request){
        // dd(Cart::getContent());

       $customer = new Customer;
       $customer->name = $request->name;
       $customer->city	= $request->city;
       $customer->address	= $request->address;
       $customer->phone = $request->phone;
       $customer->email	= $request->email;
       $customer->additional = $request->additional;
       $customer->save();



        $bill = new Bill;
        $bill->customer_id = $customer->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = Cart::getSubTotal();
        $bill->paymentx = $request->paymentMethod;
        $bill->save();

       foreach (Cart::getContent('items') as $key => $product) {
            $billd = new BillDetails;
            $billd->bill_id = $bill->id;
            $billd->product_id = $key;
            $billd->quantily = $product->quantity;
            $billd->price = $product->price *  $billd->quantily ;
            $billd->save();
        };



        return redirect()->route('cart.checkout');
    }







}
