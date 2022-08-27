<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class HomeSliderController extends Controller
{
    public function HomeSlider(){

        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all',compact('homeslide'));

     } // End Method 

     public function UpdateSlider(Request $request){

        //set image save path
        $image_save_path = null;
        $image_uploaded = $request->file('home_slide')?true:false;
        $notification = [];

        //check if image is uploaded
        if($request->file('home_slide')){
            //upload image to server
            $image = $request->file('home_slide');

            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            $image_save_path = 'upload/home_slide/'.$image_name;

            //resize and upload image to server
            Image::make($image)->resize(636,852)->save($image_save_path);
        }

        //Check if we have a slide existing
        if($request->id > 0){

            //slide already exists. Perform pertinent updates
            HomeSlide::findOrFail($request->id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $image_save_path,
            ]);

        }else{

            //slide doesn't exist. Create new slide and perform upload
            HomeSlide::create([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $image_save_path,
            ]);
        }

        if($image_uploaded){
            $notification = array(
                'message' => 'Home Slide Updated with Image Successfully', 
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Home Slide Updated without Image Successfully', 
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);

     } // End Method 
}
