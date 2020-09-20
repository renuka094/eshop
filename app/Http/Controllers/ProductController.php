<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Models\Products;
class ProductController extends Controller {
    public function fetch() {
        $client = new Client();
        $res = $client->request('GET', 'https://fakestoreapi.com/products');
        $result = (string)$res->getBody();
        $data = json_decode($result, true);
        $products = [];
        foreach ($data as $product) {
            unset($product['id']);
            $products[] = $product;
        }
        $save = Products::insert($products);
        return view('front.products.success');
    }
    public function list(Request $request) {
        $list = Products::all();
        return view('front.products.list')->with(['products' => $list]);
    }
    public function showo($id) {
        $product = Products::find($id);
        return view('front.products.product')->with('product', $product);
    }
}
