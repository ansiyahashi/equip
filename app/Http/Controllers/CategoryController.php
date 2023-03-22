<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        if ($request->ajax()) { 
            $cats = Category::latest(); 
            return DataTables::of($cats) 
                ->addIndexColumn()
                ->addColumn('image', function ($row){
                     $image_url = $row->image ? image_preview($row->image) : 'images/image.jpg';
                      return '<div class="" id="file_holder"></div><img  class="custom-upload" data-ref_id='.$row->id.' src="'.$image_url.'" border="0" width="80" class="img-rounded " align="center" /></input>';
                })
                
                ->addColumn('action', function ($row) {
                    
                    $btn = '<a class="btn btn-success" onclick="edit_modal('.$row->id.')" type="button"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>';
                    $btn = $btn . '<button class="btn btn-danger ml-3" onclick="del_cat('.$row->id.')"  type="button"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>';

                    return $btn;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }
        return view('backend.category.index');
    }

     
    public function image_upload(Request $request)
    {
        $cat_id = $request->ref_id;
        $category = Category::findOrFail($cat_id);
        $category->image = $request->image_id[0];
        $category->save();
        return response()->json(['code'=>200]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','cat_id');
        Category::updateOrCreate(['id'=>$request->cat_id],$input);
        return response()->json(['code'=>'200']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return true;
    }
}
