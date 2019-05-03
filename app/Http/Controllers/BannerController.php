<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        /* Image */
            $image = $request->file('image');
            $image_name = time().".".$image->getClientOriginalExtension();
            $folder = public_path('images/banner/');
            $image->move($folder,$image_name);

        Banner::create([
            'name' => $image_name
        ]);

        return redirect()->route('banner.index')->with('message', 'Successfully added banner');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $this->validate($request, [
            'image' => 'required|image'
        ]);

        /* Delete Image */
        $folder = public_path('images/banner/');

        if (file_exists($folder.$banner->name))
            unlink($folder.$banner->name);

        /* Image */
        $image = $request->file('image');
        $image_name = time().".".$image->getClientOriginalExtension();
        $folder = public_path('images/banner/');
        $image->move($folder,$image_name);

        Banner::find($banner->id)->update([
            'name' => $image_name
        ]);

        return redirect()->route('banner.index')->with('message', 'Successfully updated the banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        
        $folder = public_path('images/banner/');
        unlink($folder.$banner->name);
        Banner::destroy($banner->id);

        return redirect()->route('banner.index')->with('message', 'Successfully deleted the banner');
            
    }
}
