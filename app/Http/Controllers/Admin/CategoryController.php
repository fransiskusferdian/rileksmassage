<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\SubcategoryRequest;
use App\Category;
use App\Subcategory;
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
        $items = Category::all();

        return view('pages.admin.category.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
         $data = $request->all();
         Category::create($data);

        return redirect()->route('category.index')->withSuccess('New Category created!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $item = Category::findOrFail($id);

        $item->update($data);
        return redirect()->route('category.index')->withSuccess('Category renamed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->withDanger('Category removed!');;
    }

    public function subcategory()
    {
        $items = Subcategory::all();
        $categories = Category::all();
       
        return view('pages.admin.category.subcategory', [
            'items' => $items,
            'categories' => $categories
        ]);
    }

    public function storesubcategory(SubcategoryRequest $request)
    {
         $data = $request->all();
         Subcategory::create($data);

        return redirect()->route('subcategory')->withSuccess('New Sub-Category created!');;
    }

    public function destroysubcategory($id)
    {
        $category = Subcategory::findOrFail($id);
        $category->delete();
        return redirect()->route('subcategory')->withDanger('Sub-Category removed!');;
    }

    public function updatesubcategory(SubcategoryRequest $request, $id)
    {
        $data = $request->all();
        $item = Subcategory::findOrFail($id);
        $item->update($data);
        return redirect()->route('subcategory')->withSuccess('Sub-Category renamed!');
    }
}
