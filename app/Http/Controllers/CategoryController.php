<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::paginate(10);
        return view ('category.index', ['categories' => $categories]);
    }

    public function create ()
    {
        return view('category.create');
    }

    public function store (StoreCategoryRequest $request)
    {
        Category::insert([
            'title'      => $request->title,
            'is_active'  => $request->is_active,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('category.index');
    }

    public function edit (Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update (UpdateCategoryRequest $request, Category $category)
    {
        $category->title      = $request->title;
        $category->is_active  = $request->is_active;
        $category->updated_at = Carbon::now();
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy (Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
