<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Category\CategoryCreateRequest;
use App\Http\Requests\Panel\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->paginate();
        $parentCategories = Category::where('category_id', null)->get();
        return view('panel.categories.index', compact('parentCategories', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        Category::create($request->validated());
        session()->flash('status', 'دسته بندی مورد نظر به درستی ایجاد شد');

        return back();
    }

    public function edit(Category $category)
    {

        $parentCategories = Category::where('category_id', null)->where('id', '!=', $category->id)->get();
        return view('panel.categories.edit', compact('category', 'parentCategories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {

        $category->update($request->validated());
        session()->flash('status', 'دسته بندی ویرایش شد');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('status', 'دسته بندی حذف شد');
        return back();
    }
}
