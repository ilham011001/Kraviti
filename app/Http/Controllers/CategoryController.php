<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {

    	$categories = Category::latest()->get();

    	return view('backend.category.index', compact('categories'));
    }

    public function create()
    {

    	return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        Category::create($request->all());

        return redirect()
                ->route('category.index')
                ->with('message', 'Successfully added categories');
    }

    public function show($id)
    {

        $category = Category::find($id);
        return view('backend.category.show', compact('category'));
    }

    public function edit($id) {

        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $req, $id) {

        $this->validate($req, [
            'name' => 'required'
        ]);

        Category::find($id)->update($req->all());

        return redirect()->route('category.index')->with('message', 'Successful update category');
    }    

    public function destroy(Category $category)
    {
        $category->delete();
    	// Category::destroy($id);

    	return redirect()
                ->route('category.index')
                ->with('message', 'Successfully deleted the category');
    }

    
}
