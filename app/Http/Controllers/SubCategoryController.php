<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubCategoryController extends Controller
{
    
    public function index(Request $request)
    { 
        if ($request->ajax()) { 
            $cats = SubCategory::latest(); 
            return DataTables::of($cats) 
                ->addIndexColumn()
                ->addColumn('category', function ($row){
                    return $row->cat->name;
                 })
                
                ->addColumn('action', function ($row) {
                    
                    $btn = '<a class="btn btn-success" onclick="edit_modal('.$row->id.')" type="button"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>';
                    $btn = $btn . '<button class="btn btn-danger ml-3" onclick="del_cat('.$row->id.')"  type="button"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>';

                    return $btn;
                })
                ->rawColumns(['image','action'])
                ->make(true);
        }
        $cats = Category::get(); 
        return view('backend.subcategory.index',compact('cats'));
    }

     
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        $input = $request->except('_token','subcat_id');
        SubCategory::updateOrCreate(['id'=>$request->subcat_id],$input);
        return response()->json(['code'=>'200']);
    }

    
    public function show(SubCategory $subCategory)
    {
        //
    }

    
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return response()->json($subcategory);
    }

    
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

     
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return true;
    }
}
