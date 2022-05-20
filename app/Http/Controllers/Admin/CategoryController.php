<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreRequest $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('admin.categories.edit', $category)->with('info','The category was created successfully');
    }

    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('info','The category was updated successfully');
    }

    public function destroy(category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info','The category was removed successfully');
    }
}
