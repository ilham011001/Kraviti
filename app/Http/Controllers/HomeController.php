<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Banner;
use App\Faq;
use App\Product;
use App\Order;
use App\Hope;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::count();
        $banner  = Banner::count();
        $faq      = Faq::count();
        $product  = Product::count();
        $order  = Order::count();
        $hope    = Hope::count();
        // $orders = Order::all();

        return view('backend.index', compact('category', 'banner', 'faq', 'product', 'order', 'hope'));
    }
}
