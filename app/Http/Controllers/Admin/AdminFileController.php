<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use App\File;
use Auth;

class AdminFileController extends Controller
{
    //
     public function __construct()
    {
    	
        $this->params = array(
        	'msg' => '',
			'user' => Auth::user()
			);
    }

	public function index(){

		$files = File::all();
		$this->params['files'] = $files;

		return view('admin.files.index')->with($this->params);
	}	
	public function show(){

	}

	public function create(){

	}

	public function store(Request $request){

		try {
            // Get uploaded file
            $file = $request->file('files');
            // Generate name
            $image_name = time().".".$file->getClientOriginalExtension();
            // Get Extension
            $extension = $file->getClientOriginalExtension();
            // Move to uploads
            $file->move('uploads', $image_name);
            
            // Get Mimetype
            $mimetype = $file->getClientMimeType();
            $arr_mime = explode("/", $mimetype);
            
            $thumbnail_path = "video-thumbnail.png";


           	if(!is_dir("uploads/thumbnails")){
           		mkdir("uploads/thumbnails");
           	}
            
            if ( $arr_mime[0] === "image" ) {
                
                $thumbnail_path = "thumbnail-".$image_name;
                $image = Image::make(sprintf('uploads/%s', $image_name))->resize(64 , 64)->save(sprintf('uploads/thumbnails/%s', $thumbnail_path));
            
            }
            $path = url('uploads/' . $image_name);
                           
        } catch (Exception $e) {

            return response()->json(array(
                'error'=> true,
                'msg'=> $e->getMessage(),
                ));
        }
     
        if ($request->hasFile('files')) {
            // Add new Media File
            $media = New File;
            $media->name                = $file->getClientOriginalName();
            $media->size                = $file->getClientSize();
            $media->url                 = $path;
            $media->thumbnailUrl        = url(sprintf('uploads/thumbnails/%s', $thumbnail_path));
            $media->deleteUrl           = $path;
            $media->deleteType          = "DELETE";
            $media->mimeType            = $file->getClientMimeType();
            $media->status              = 'Active';
            $media->save();

            $media->deleteUrl           = "/admin/files/".$media->id."";
            $media->save();

            $file = File::find($media->id);

            return response()->json(array(
                'files'=> array($file)
                ));
        }else{
            return response()->json(array('status' => 'error'));
        }
	}

	public function destroy($id){

		$file = File::find($id);
		$file->destroy();

		$this->params['error'] = false;
		$this->params['msg'] = "Successfully Deleted a file!";

        return redirect('admin/files')->with($this->params);

	}
}

