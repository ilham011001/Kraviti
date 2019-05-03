<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    Public function index() 
    {
    	$products = Product::paginate();
    	return view('backend.product.index', compact('products'));
    }

    public function create() {

    	$categories = Category::all();
    	return view('backend.product.create', compact('categories'));
    }

    public function store(Request $req) {

    	$this->validate($req, [
    		'product_code'=>'required',
    		'name'		  =>'required',
    		'category_id' =>'required|numeric',
    		'price'       =>'required|numeric',
    		'description' =>'required',
    		'publish'     => 'required',
            'image'       => 'required|image'
    	]);

    	/* Image */
    		$image = $req->file('image');
    		$image_name = time().".".$image->getClientOriginalExtension();
    		$folder = public_path('images/product/');
    		$image->move($folder,$image_name);

    	$save = Product::create([
    		'product_code' => $req->product_code,
    		'name'         => $req->name,
    		'category_id'  => $req->category_id,
    		'price'        => $req->price,
    		'description'  => $req->description,
            'image'        => $image_name,
    		'publish'      => $req->publish,
    	]);


    	return redirect()->route('product.show', $save->id)->with('message', 'Successfully added product');
    }

    public function show($id) {

    	$product = Product::find($id);
    	return view('backend.product.show', compact('product'));
    }

    public function destroy($id) {

        $product = Product::find($id);
        $folder = public_path('images/product/');
        if (file_exists($folder.$product->image))
            unlink($folder.$product->image);   
        $product->delete();

        return redirect()->route('product.index')->with('message','Successfully deleted the image');
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();

        return view('backend.product.edit', compact('product', 'categories'));
    }

    public function update(Request $req, $id) {

        $validate = [
            'name'        =>'required',
            'category_id' =>'required|numeric',
            'price'       =>'required|numeric',
            'description' =>'required',
            'publish'     => 'required'
        ];

        $update = [
            'name'         => $req->name,
            'category_id'  => $req->category_id,
            'price'         => $req->price,
            'description'   => $req->description,
            'publish'       => $req->publish,
        ];

        if (!empty($req->image)) 
            $validate['image'] = 'required|image';

        $this->validate($req, $validate);

        if (!empty($req->image)) {
            /* Delete image */
            $product = Product::find($id);
            $folder = public_path('images/product/');
            if (file_exists($folder.$product->image))
                unlink($folder.$product->image);

            /* Image */
            $image = $req->file('image');
            $image_name = time().".".$image->getClientOriginalExtension();
            $folder = public_path('images/product/');
            $image->move($folder,$image_name);

            $update['image'] = $image_name;
        }


        $update = Product::find($id)->update($update);

        return redirect()->route('product.show', $id)->with('message', 'Successful update product');
    }
}

