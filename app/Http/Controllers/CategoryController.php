<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('pagerole');
    }

    public function index()
    {
      $categories = Category::all();
      return view('category.index', compact('categories'));
    }

    public function create()
    {
      return view('category.create');
    }

    public function store(Request $request)
    {
      Category::create($request->all());
      return redirect('category');
    }

    public function show(Category $category)
    {
      return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
      return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
      // $category->update($request::all());
      Category::find($id)->update($request->all());
      return redirect('category');
    }

    public function destroy(Category $category)
    {
      $category->delete();
      redirect('category');
    }
}
