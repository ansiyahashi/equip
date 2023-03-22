<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $banners = Banner::latest();
            return DataTables::of($banners)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    
                    return '<div class="" id="file_holder"></div><img  class="custom-upload" data-ref_id=' . $row->id . ' src="public/' . $row->image . '" border="0" width="80" class="img-rounded " align="center" /></input>';
                })

                ->addColumn('action', function ($row) {

                    $btn = '<a class="btn btn-success" onclick="edit_modal(' . $row->id . ')" type="button"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>';
                    $btn = $btn . '<button class="btn btn-danger ml-3" onclick="del_banner(' . $row->id . ')"  type="button"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>';

                    return $btn;
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('backend.banners.index');
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
        if ($request->hasFile('file')) {
            $extension = strtolower($request->file('file')->getClientOriginalExtension());
            $file = $request->file('file');
            $original_name = $file->getClientOriginalName();
            $image = 'image' . md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $path = $file->move('public/uploads/all/', $image);
            $image =  'uploads/all/' . $image;
            $input = [
                'seller_id' => auth()->user()->id,
                'image' => $image,
                'type' =>  $request->type,
            ];
            Banner::updateOrCreate(['id'=>$request->cat_id],$input);
            return response()->json(['code' => 200]);
        } else {
            return response()->json(['code' => 500]);
        }
    }

   

  
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return true;
    }
}
