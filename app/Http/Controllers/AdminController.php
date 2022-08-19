<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function profile(){
        //get ID of user who is logged in
        $id = Auth::user()->id;
        $admin = User::find($id);

        return view('admin.admin_profile_view', compact('admin'));
    } // End method


    public function edit_profile(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit', compact('editData'));
    }// End method

    public function store_profile(Request $request){

        //get profile of logged in user
        $user = User::find(Auth::user()->id);

        //update user details
        $user->name = $request->name;
        $user->email = $request->email;

        //consider profile pic uploaded
        if($request->file('profile_image')){
            //get the file
            $file = $request->file('profile_image');

            //set the file name using the date
            $filename = date('YmdHi').$file->getClientOriginalName();

            //upload the file to the server directory
            $file->move(public_path('upload/admin_images'),$filename);

            //set the filename to save in db
            $user['profile_image'] = $filename;
        }

        $user->save();

        //send notification on saved profile
        $notifaction = array(
            'message' => 'Profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notifaction);
    }// End method

    public function change_password(){
        return view('admin.admin_password_change');
    }

    public function update_password(Request $request){
        
        //validate request
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $oldpassword_hashed = Auth::user()->password;
        if(Hash::check($request->oldpassword, $oldpassword_hashed)){

            //incorrect old password.
            //Save new password
            $user = User::find(Auth::user()->id);

            $user->password = bcrypt($request->newpassword);
            $user->save();

            session()->flash('message', 'Password changed succesfully');
            return redirect()->back()->with(array(
                'message' => 'Password changed successfully',
                'alert-type' => 'success'
            ));
        }else{
            //invalid password
            return redirect()->back()->with(array(
                'message' => 'Invalid old password',
                'alert-type' => 'error'
            ));
        }
    }
}
