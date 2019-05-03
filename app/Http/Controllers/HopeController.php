<?php

namespace App\Http\Controllers;

use App\Hope;
use Illuminate\Http\Request;

class HopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hopes = Hope::latest()->get();
        return view('backend.hope.index', compact('hopes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hope.create');
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
        	'title' => 'required',
        	'description' => 'required',
        	'image' => 'required|image'
        ]);

        /* Image */
            $image = $request->file('image');
            $image_name = time().".".$image->getClientOriginalExtension();
            $folder = public_path('images/hope/');
            $image->move($folder,$image_name);

        Hope::create([
        	'title' => $request->title,
        	'description' => $request->description,
        	'image' => $image_name
        ]);

        return redirect()->route('hope.index')->with('message', 'Succesfully added hope');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hope = Hope::find($id);
        return view('backend.hope.show', compact('hope'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$hope = Hope::find($id);
        return view('backend.hope.edit', compact('hope'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$validate = [
    		'title' => 'required',
    		'description' => 'required'
    	];
    	$update = [
    		'title' => $request->title,
    		'description' => $request->description
    	];

    	if (!empty($request->image))
    		$validate['image'] = 'required|image';

        $this->validate($request, $validate);

        if (!empty($request->image)) {

        	$hope = Hope::find($id);
        	/* Image */
            $image = $request->file('image');
            $image_name = time().".".$image->getClientOriginalExtension();
            $folder = public_path('images/hope/');
            $image->move($folder,$image_name);

            $folder = public_path('images/hope/');
            if (file_exists($folder.$hope->image))
        	   unlink($folder.$hope->image);
        	$update['image'] = $image_name;
        } 

        Hope::find($id)->update($update);

        return redirect()->route('hope.show', $id)->with('message', 'Succesfully updated the hope');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$hope = Hope::find($id);
        $folder = public_path('images/hope/');
        if (file_exists($folder.$hope->image))
            unlink($folder.$hope->image);
        $hope->delete();

        return redirect()->route('hope.index')->with('message', 'Successfully deleted the hope');
    }
}
