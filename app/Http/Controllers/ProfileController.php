<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile; 
use Auth;
use Image;

class ProfileController extends Controller
{
    
    public function profile(){
        return view('profiles.profile', array('user' => Auth::user()));
    }

    public function add_profile_pic(Request $request){
          if($request->hasFile('profile_pic')){
              $profile_pic = $request->file('profile_pic');
              $filename=time() . '.' . $profile_pic->getClientOriginalExtension();
              Image::make($profile_pic)->resize(300,300)->save(public_path('/uploads/profile_pics/' . $filename));
              $profile_pic = Image::make(public_path('/uploads/profile_pics/' . $filename));
              $profile_pic->insert(public_path('images/favicon.png'), 'bottom-right', 30, 60);
              $profile_pic->save(public_path('/uploads/profile_pics/' . $filename)); 
              $user=Auth::user();
              $user->profile_pic = $filename;
              $user->save();
          }
          return view('profiles.profile', array('user' => Auth::user()));
    }



    //    $this->validate($request,[
    //    'name' => 'required',
    //    'profile_pic' =>'required'
    //    ]);
    //    $profiles = new Profile;
    //    $profiles->user_id = Auth::user()->id;
    //    $profiles->name = $request->input('name');
    //    if(Request::hasFile('profile_pic')){
    //          $file = Request::file('profile_pic');
    //          $file->move(public_path(). '/uploads', $file->getClientOriginalName());
    //          $url = URL::to("/") . '/uploads'. $file->getClientOriginalName();
    //          return $url;
    //          exit();
    //    }
    //    $profiles->profile_pic = $url;
    //    $profiles->save();
    //    return redirect('response', 'Profile added succesfully');

    // $this->validate($request,[
    //     'name'=>'required|string|max:255',
    //     'profile_pic' => 'image'

    //   ]);
    //   $image = $request->file('image');
    //   $new_name = rand() . '.' . $image->getClientOriginalExtension();
    //   $image->move(public_path('images'), $new_name);
      
    //   $recipe = Recipe::create([
    //     'name'     => $request->input('name'),
    //     'body'      => $request->input('body'),
    //     'image' => $new_name,
        
    //     'user_id'   => auth()->user()->id
    // ]);
      
    // return redirect()->route('recipes.index')->with('success','recipe created success');

    // if($request->hasFile('profile_pic')){
    //     $profile_pic = $request->file('profile_pic');
    //     $filename = time() . '.' . $avatar->getClientOriginalExtension();
    //     Image::make($profile_pic)->resize(300, 300)->save( public_path('/uploads/profile_pics/' . $filename ) );
    //     $user = Auth::user();
    //     $user->avatar = $filename;
    //     $user->save();
    // }
    // return view('profile', array('user' => Auth::user()) );
    

    
    
}
