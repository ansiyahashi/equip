<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use App\Models\User;
use Image;
use Auth;

class UploadController extends Controller
{

    public function index(Request $request)
    {
         $all_uploads = (auth()->user()->user_type == 'Seller') ? Upload::where('user_id',auth()->user()->id) : Upload::query();
        $search = null;
        $sort_by = null;

        if ($request->search != null) {
            $search = $request->search;
            $all_uploads->where('file_original_name', 'like', '%'.$request->search.'%');
        }

        $sort_by = $request->sort;
        switch ($request->sort) {
            case 'newest':
                $all_uploads->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $all_uploads->orderBy('created_at', 'asc');
                break;
            case 'smallest':
                $all_uploads->orderBy('file_size', 'asc');
                break;
            case 'largest':
                $all_uploads->orderBy('file_size', 'desc');
                break;
            default:
                $all_uploads->orderBy('created_at', 'desc');
                break;
        }

        $all_uploads = $all_uploads->paginate(60)->appends(request()->query());

        return view('backend.uploaded_files.index', compact('all_uploads', 'search', 'sort_by'));
    }

    public function create()
    {
        return view('backend.uploaded_files.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function get_uploaded_files(Request $request)
    {

        $uploads = Upload::where('user_id', auth()->user()->id)->orderBy('id','desc');
        return $uploads->paginate(20)->appends(request()->query());
    }
    public function upload(Request $request)
    {
 
        $type = array(
            "jpg" => "image",
            "jpeg" => "image",
            "png" => "image",
            "svg" => "image",
            "webp" => "image",
            "gif" => "image",
           
            "7z" => "archive",
            "doc" => "document",
            "txt" => "document",
            "docx" => "document",
            "pdf" => "document",
            "csv" => "document",
            "xml" => "document",
            "ods" => "document",
            "xlr" => "document",
            "xls" => "document",
            "xlsx" => "document"
        );
        if ($request->hasFile('file')) { 
            $upload = new Upload;
            $extension = strtolower($request->file('file')->getClientOriginalExtension());
            $file = $request->file('file');
            $original_name = $file->getClientOriginalName();
            $image = 'image' . md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension(); 
            $path = $file->move('public/uploads/all/', $image);

            $image =  'uploads/all/' . $image;
            $upload->extension = $extension;
            $upload->file_name = $image;  
            $upload->file_original_name = $original_name;
            $upload->user_id = auth()->user()->id;
            $upload->type = $type[$upload->extension];
            // $upload->file_size = '';
            $upload->save();
            return $upload->id;
        }
    }
    public function show(Upload $upload)
    {
        //
    }

    public function edit(Upload $upload)
    {
        //
    }

    public function update(Request $request, Upload $upload)
    {
        //
    }

    public function destroy(Upload $upload)
    {
        //
    }
}
