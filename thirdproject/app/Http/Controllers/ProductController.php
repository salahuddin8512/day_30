<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private $product;
    private $products;


    public function index()
    {
        return view('product.add');
    }

    public function create(Request $request)
    {
        product::newProduct($request);
        return redirect('/add-product')->with('message', 'Product information save successfully');
    }
    public function manage()
    {
        $this->products =product::orderBy('id', 'desc')->get();
        return view('product.manage-product',['products' => $this->products]);
    }
    public function edit($id)
    {
        $this->products= Product::find($id);
        return view('product.edit-product',['product' => $this->products]);
    }
    public static function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('message', 'Product information save successfully');
    }
    public function delete($id)
    {
        $this->product = Product::find($id);
        $this->product->delete();
        return redirect('manage-product')->with('message', 'Product information delete successfully');
    }
}
