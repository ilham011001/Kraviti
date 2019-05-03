<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Product;
use App\Hope;
use App\About;
use App\Faq;
use App\Order;
use App\Contact;
use App\Category;
use Illuminate\Http\Request;

class KravitiController extends Controller
{
    public function home()
    {
    	$banners = Banner::all();
    	$products = Product::latest()->limit(3)->get();
    	$hope    = Hope::latest()->first();
    	return view('frontend.home', compact('banners', 'products', 'hope'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $products = $category->products;
        return view('frontend.product_category', compact('products', 'categories'));
    }

    public function product()
    {
        $categories = Category::all();
    	$products = Product::all();
    	return view('frontend.product', compact('products', 'categories'));
    }

    public function product_detail(Product $product) 
    {
        return view('frontend.product_detail', compact('product'));
    }

    public function about()
    {
        $about = About::find(1);
        $hopes = Hope::all();
        return view('frontend.about', compact('about', 'hopes'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('frontend.faq', compact('faqs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function store_request(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email'  => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Order::create($request->all());

        return redirect('/')->with('message', 'successfully sent a request');
    }

    public function store_contact(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email'  => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return redirect('/contact')->with('message', 'successfully sent a request');
    }

    public function data_product()
    {
        return response()->json(['list'=>Product::latest()->get()]);
    }

    public function data_category($id)
    {
        return response()->json(['list'=>Category::find($id)->products]);
    }

    public function category_list()
    {
        return response()->json(['list'=>Category::all()]);
    }
}
