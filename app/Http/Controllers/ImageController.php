<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Image;
use Auth;
use File;

class ImageController extends Controller
{
 
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function resizeImage()
	{
		return view('resizeImage');
	}

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImagePost(Request $request)
    {
	    $this->validate($request, [
	    	'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8192',
        ]);
		
        $image = $request->file('image');
        $name=  explode(".", $image->getClientOriginalName() )[0];
        $input['imagename'] = strtolower($name) .'.'.strtolower($image->getClientOriginalExtension() );
        //$destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        //$img->resize(100, 100, function ($constraint) {
		    //$constraint->aspectRatio();
		//})->save($destinationPath.'/'.  $input['imagename']);
		$this->makeDirectory('avatars/'.Auth::user()->id);
        $destinationPath = public_path('avatars/'.Auth::user()->id."/");
        $img->resize('200', null, function($constraint){ $constraint->aspectRatio(); })->crop(200,200)->save($destinationPath . $input['imagename']);

		$this->updateAvatar(Auth::user()->id,  'avatars/'. Auth::user()->id .'/'. $input['imagename']);
		$user=User::findOrFail(Auth::user()->id);
        return view('user.profile', compact('user' ) )
        	->with('success','Image Upload successful')
        	->with('imageName',$input['imagename']);
    }

	public function makeDirectory($dir){
		if (!file_exists($dir) ){
			File::makeDirectory($dir, 0777, true);
		}
	}

    public function updateAvatar($user_id, $path){
		$user = User::findOrFail($user_id);
        $user->update(array('avatar_path' => $path) );
    }

}


