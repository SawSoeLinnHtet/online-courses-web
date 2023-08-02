<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->checkRolePermission('view-category');
        if ($request->ajax()) {

            $data = Category::get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.category.index');
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
        $this->checkRolePermission('create-category');
        $data = $request->validate([
            'title' => 'required',
        ]);
        $slug = Str::slug($request->title);
        
        Category::create([
            'title' => $request->title,
            'slug' => $slug
        ]);

        return response()->json(['success' => 'Category Created']);
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
    public function edit(Category $category)
    {
        $this->checkRolePermission('edit-category');
        return response()->json(['result' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->checkRolePermission('edit-category');
        $data = $request->validate([
            'title' => 'required',
        ]);
        $slug = Str::slug($request->title);

        $category->update([
            'title' => $request->title,
            'slug' => $slug
        ]);

        return response()->json(['success' => 'Category Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->checkRolePermission('delete-category');
        $category->delete();

        return response()->json(['success' => 'Category is deleted']);
    }
}
