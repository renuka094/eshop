<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderProducts;
class CartController extends Controller
{
    
	public function index(Request $request)
    { 
$session = $request->session();
       
       $cartData = ($session->get('cart')) ? $session->get('cart') : array();
$total=0;
		foreach($cartData as $key=>$value){

		if($key !=''){

		$product = Products::find($key);
$cartData[$key]['product']=$product;
		$total = $total+($value['qty']*$product->price);
		}
else{unset($cartData[$key]);}
		}

        return view('front.carts.cart', [
            'cartItems' => $cartData,
            'subtotal' => $total	
        ]);
    }

 public function checkout(Request $request){

$session = $request->session();
       
       $cartData = ($session->get('cart')) ? $session->get('cart') : array();
$total=0;
		foreach($cartData as $key=>$value){

		if($key !=''){

		$product = Products::find($key);
$cartData[$key]['product']=$product;
		$total = $total+($value['qty']*$product->price);
		}
else{unset($cartData[$key]);}
		}

        return view('front.carts.checkout', [
            'cartItems' => $cartData,
            'subtotal' => $total	
        ]);
}


 public function doCheckout(Request $request){

$session = $request->session();
$data=$request->all();

$cartData = ($session->get('cart')) ? $session->get('cart') : array();
$total=0;
		foreach($cartData as $key=>$value){

		if($key !=''){

		$product = Products::find($key);
$cartData[$key]['product']=$product;
		$total = $total+($value['qty']*$product->price);
		}
else{unset($cartData[$key]);}
		}

if(Auth::user()){
$insertData = array(
            'email' => Auth::user()->email,
            'customer_name' => Auth::user()->name,
            'customer_id' => Auth::user()->id,
            'customer_type' =>'customer'
        );

       
}
else{
$insertData = array(
            'email' => $data['email'],
            'customer_name' =>  $data['name'],
          
            'customer_type' =>'guest'
        );
}
  $insertData['total'] =  $total;    
       $cartData = ($session->get('cart')) ? $session->get('cart') : array();
$total=0;
		foreach($cartData as $key=>$value){

		if($key !=''){

		$product = Products::find($key);
$cartData[$key]['product']=$product;
		$total = $total+($value['qty']*$product->price);
		}
else{unset($cartData[$key]);}
		}
$order = Orders::create($insertData);
$lastInsertedID = $order->id;
$insertPData = array(
            'order_id' => $lastInsertedID
        );
        foreach($cartData as $key=>$value){

		if($key !=''){

		$product = Products::find($key);
$insertPData['product_name'] =  $product->title;
$insertPData['price'] =  $product->price;
$insertPData['qty'] = $value['qty'];
$order = OrderProducts::create($insertPData);
		}
else{unset($cartData[$key]);}
		}
return redirect('success');
 

}

public function success(Request $request){
$request->session()->forget('cart');
return view('front.carts.success');
}


public function ajaxAdd(Request $request) {
        $id = $request->input('product_id');
$qty =$request->input('quantity')?? 1;

        $session = $request->session();
        $cartData = ($session->get('cart')) ? $session->get('cart') : array();

        if (array_key_exists($id, $cartData)) {
$oldQty = $cartData[$id]['qty'];
            $cartData[$id]['qty']=$qty+$oldQty;
        } else {
            $cartData[$id] = array(
                'qty' => $qty
            );
        }

        $request->session()->put('cart', $cartData);
        $qtny = count($session->get('cart'));
        //return redirect()->back()->with('message', 'Product Added Successfully!');
        return response()->json(['msg' => $qtny], 200);
    }
}