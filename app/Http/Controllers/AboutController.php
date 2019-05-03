<?php

namespace App\Http\Controllers;

use App\about;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        return view('backend.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(about $about)
    {
        return view('backend.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, about $about)
    {
        $validate = [
            'description' => 'required',
            'vision' => 'required',
            'mission' => 'required'
        ];

        $update = [
            'description' => $request->description,
            'vision' => $request->vision,
            'mission' => $request->mission
        ];

        if (!empty($request->image))
            $validate['image'] = 'required|image';

        $this->validate($request, $validate);

        if (!empty($request->image)) {

            /* Image */
            $image = $request->file('image');
            $image_name = time().".".$image->getClientOriginalExtension();
            $folder = public_path('images/about/');
            $image->move($folder,$image_name);

            $folder = public_path('images/about/');
            if (file_exists($folder.$about->image))
               unlink($folder.$about->image);
            $update['image'] = $image_name;
        } 

        $about->update($update);

        return redirect()->route('about.index')->with('message', 'Succesfully updated the about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(about $about)
    {
        //
    }
}
