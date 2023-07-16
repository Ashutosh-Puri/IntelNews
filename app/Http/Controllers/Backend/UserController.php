<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Backend\UserFormRequest;
use App\Http\Requests\Backend\ProfileFormRequest;
use App\Http\Requests\Backend\PasswordChangeFormRequest;

class UserController extends Controller
{

    public function UserDashboard(){

        $id = Auth::user()->id;

        $userData = User::find($id);

        return view('frontend.user_dashboard',compact('userData'));

    }

    public function UserProfileStore(ProfileFormRequest $request){

        $id = Auth::user()->id;

        //  model user.

        $data =  User::find($id);

        $data->name         = $request->name;
        $data->username     = $request->username;
        $data->email        = $request->email;
        $data->phone        = $request->phone;


        // file('photo') = file()  type input file

        if ($request->file('photo')) {

            if($request->hasFile('photo')){
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                Image::make($photo)->resize(300, 300)->save(public_path('upload/user_images/'.$filename));
                $photoPath = 'upload/user_images/'.$filename;

                $data->photo= $photoPath;
            }


        }

        $data->update();

        return back()->with('status','Profile updated successfully');

    }

    public function UserChangePassword(){

        $id = Auth::user()->id;

        $userData = User::find($id);

        return view('frontend.user_change_password',compact('userData'));

    }

    public function UserChangePasswordStore(PasswordChangeFormRequest $request){

            dd("");
        $hashedPassword = Auth::user()->password;

        if (!Hash::check($request->old_password, $hashedPassword)) {
            $notification = array(

                'message' => 'Old Password Doesn"t" Match',
    
                'alert-type' => 'error'
    
            );
            return redirect()->back()->with('error','Old Password Doesn"t" Match')->with($notification);

        }

        User::whereId(auth()->user()->id)->update([

            'password' => Hash::make($request->new_password)

        ]);

        $notification = array(

            'message' => 'Password Changed Succesfully',

            'alert-type' => 'success'

        );

        return redirect()->back()->with('status','Password Changed Succesfully')->with($notification);


    }

    public function UserLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'User Logout Successfully',

            'alert-type' => 'success'

        );

        return redirect('/login')->with('status','User Logout Successfully')->with($notification);

    }

    public function AllUser(){

        $user = User::where('role','user')->latest()->get();

        return view('backend.user.all_user',compact('user'));

    }

    public function AddUser(){

        

        return view('backend.user.add_user');

    }

    public function StoreUser(UserFormRequest $request){

        $user = new User();

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        $user->role = 'user';
        $user->status = 'inactive';

        $user->save();

        if ($request->role) {

            // assignRole()  laravel spattie

            $user->assignRole($request->role);

        }

        $notification = array(

            'message' => 'New Added Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.user')->with($notification);

    }

    public function EditUser($id){

       

        $user = User::findOrFail($id);

        return view('backend.user.edit_user',compact('user'));

    }

    public function UpdateUser(UserFormRequest $request ,$id){

        $user = User::findOrFail($id);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'user';
        $user->status = 'active';

        $user->save();

        $user->roles()->detach();

        if ($request->role) {

            // assignRole()  laravel spattie

            $user->assignRole($request->role);

        }

        $notification = array(

            'message' => 'Admin Updated Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.user')->with($notification);

    }

    public function DeleteUser($id){

        $user = User::findOrFail($id);


       
        if(File::exists($user->photo )) {
            File::delete($user->photo);
        }
        
         $user->delete();

     

        $notification = array(

            'message' => 'Portfolio Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

    public function InactiveUser($id){

        User::findOrFail($id)->update([

            'status' => 'inactive',

        ]);

        $notification = array(

            'message' => 'Inactivated User Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

    public function ActiveUser($id){

        User::findOrFail($id)->update([

            'status' => 'active',

        ]);

        $notification = array(

            'message' => 'Activated User Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }


    public function UserDeleteProfilePhoto($id){

    
        $user = User::findOrFail($id);


       
        if(File::exists($user->photo )) {
            File::delete($user->photo);
            $user->photo=null;
            
        }
        
        $user->update();

     

        $notification = array(

            'message' => 'User Profile Photo Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}
