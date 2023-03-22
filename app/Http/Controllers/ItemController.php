<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Yajra\DataTables\DataTables;

class ItemController extends Controller
{
    public function index(Request $request)
    {  
        if ($request->ajax()) { 
            if(Auth::user()->user_type=='admin')
            {
                $items = Item::latest(); 
            }else
            {
                $items = Item::where('seller_id',Auth::user()->seller_id)->latest(); 
            }
           
            return DataTables::of($items) 
                ->addIndexColumn()
                ->addColumn('image', function ($row){
                     $image_url = $row->image ? image_preview($row->image) : 'images/image.jpg';

                      return '<div class="" id="file_holder"></div><img  class="custom-upload" data-url="'.route('item_image').'" data-ref_id='.$row->id.' src="'.$image_url.'" border="0" width="80" class="img-rounded " align="center" /></input>';
                })
                ->editColumn('service_provider_id', function($row){
                    if($row->seller->user)
                    {
                        return $row->seller->user->name;
                    }else
                    {
                        return 'admin';
                    }
                })
                ->editColumn('price', function($row){
                 return  $row->price.'<br>'.'Minute---'.$row->day.'<br>Hour---'.$row->week.'<br>Daily---'.$row->month;
                    
                })
                ->addColumn('action', function ($row) {
                    $url = route('item.index').'/'."$row->id".'/edit';
                    $btn = '<a class="btn btn-success" href="'.$url.'" type="button"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>';
                    $btn = $btn . '<button class="btn btn-danger ml-3" onclick="del_cat('.$row->id.')"  type="button"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>';

                    return $btn;
                })
                ->rawColumns(['image','action','price'])
                ->make(true);
        }
        return view('backend.item.index');
    }
 
    public function create()
    { 
         $category = Category::get();
         return view('backend.item.create',compact('category'));
    }

    public function item_image(Request $request)
    { 
        $cat_id = $request->ref_id;
        $item = Item::findOrFail($cat_id);
        $item->image = $request->image_id[0];
        $item->save();
        return response()->json(['code'=>200]);
    }
    public function store(Request $request)
    {
        $input = $request->except('_token','asset_id');
        $input['driver'] = $request->driver == 'on' ? 1 : 0;
        $input['seller_id'] = Auth::user()->id;
        Item::updateOrCreate(['id'=>$request->item_id],$input);
        return response()->json(['code'=>200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::get();
        $item = Item::findOrFail($id); 
        return view('backend.item.create',compact('category','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    public function destroy($id)
    {
        Item::find($id)->delete();
        return true;
    }
}
