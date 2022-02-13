<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updatePassword(Request $request){
        $user = Auth::user();
        $userPassword = $user->password;
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required'
        ]);
        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password' => 'password not match']);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success','password successfully updated');
    }
    public function updateProfileView(){
        return view('admin.profile');
    }
    public function updatePhoto(Request $request){
        $request->validate([
            'avatar' => 'required|file|mimes:png,jpeg,jpg,max:1000',
        ]);
        $newName = uniqid()."_profile.".$request->file('avatar')->extension();
        $request->file('avatar')->storeAs("public/profile",$newName);
        $currentUser = User::find(Auth::id());
        $currentUser->avatar = $newName;
        $currentUser->update();

        return redirect()->back();
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
//            'email' => 'required|unique:users,email',
            'bio' => 'required|min:15',
            'phone' => 'required|numeric|min:11',
            'company' => 'required',
            'job' => 'required',
            'country' => 'required',
            'address' => 'required',
        ]);


        $currentUser = User::find(Auth::id());
        $currentUser->name = $request->name;
        $currentUser->phone = $request->phone;
        $currentUser->bio = $request->bio;
        $currentUser->company = $request->company;
        $currentUser->job = $request->job;
        $currentUser->country = $request->country;
        $currentUser->address = $request->address;
        $currentUser->update();

        return redirect()->back();
    }
    public function updateSocial(Request $request){
        $request->validate([
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
        ]);

        $currentUser = User::find(Auth::id());
        $currentUser->facebook = $request->facebook;
        $currentUser->instagram = $request->instagram;
        $currentUser->twitter = $request->twitter;
        $currentUser->linkedin = $request->linkedin;
        $currentUser->youtube = $request->youtube;
        $currentUser->update();

        return redirect()->back();
    }
}
