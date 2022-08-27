<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class AboutController extends Controller
{
    public function HomeAbout(){

        $aboutpage = About::find(1);
        return view('frontend.about_page',compact('aboutpage'));

    } 

    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all', compact('aboutpage'));
    }
    

    public function UpdateAboutPage(Request $request){

        $image_save_path = null;
        $notification = [];

            
        //upload image
        if($request->file('about_image')){
            //image uploaded. Use Image library to resize and store it
            $image = $request->file('about_image');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            $image_save_path = 'upload/about_image/'.$image_name;

            //resize and upload image to server
            Image::make($image)->resize(636,852)->save($image_save_path);
        }

        //Check if page was created
        if($request->id > 0){

            About::findOrFail($request->id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'about_image' => $image_save_path,
            ]);

            $notification = array(
                'message' => 'About Page content updated successfully', 
                'alert-type' => 'success'
            );
        }else{

            //create new about page content
            About::create([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'about_image' => $image_save_path,
            ]);

            $notification = array(
                'message' => 'New About Page content created successfully', 
                'alert-type' => 'success'
            );

        }

        return redirect()->back()->with($notification);

    }
}
