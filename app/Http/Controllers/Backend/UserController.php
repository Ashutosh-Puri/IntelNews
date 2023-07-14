<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\UserFormRequest;

class UserController extends Controller
{
    // public function AdminProfile(){

    //     $id = Auth::user()->id;

    //     $adminData = User::find($id);

    //     return view('admin.admin_profile_view',compact('adminData'));

    // }

    // public function AdminProfileStore(Request $request){

    //     $id = Auth::user()->id;

    //     // Mengambil dari model user.

    //     $data =  User::find($id);

    //     $data->name         = $request->name;
    //     $data->username     = $request->username;
    //     $data->email        = $request->email;
    //     $data->phone        = $request->phone;


    //     // file('photo') = file() mengambil type input file

       


    //         if($request->hasFile('photo')){
    //             $photo = $request->file('photo');
    //             $filename = time() . '.' . $photo->getClientOriginalExtension();
    //             Image::make($photo)->resize(300, 300)->save(public_path('upload/admin_images/'.$filename));
    //             $photoPath = 'upload/admin_images/'.$filename;

    //             $data->photo= $photoPath;
    //         }

          
    //     $data->save();

    //     $notification = array(

    //         'message' => 'Admin Profile Update Successful',

    //         'alert-type' => 'success'

    //     );

    //     return redirect()->route('admin.profile')->with($notification);

    // }

    // public function AdminChangePassword(){

    //     return view('admin.admin_change_password');

    // }

    // public function AdminUpdatePassword(Request $request){

    //     $request->validate([

    //         'old_password' => 'required',
    //         'new_password' => 'required',
    //         'confirm_password' => 'required|same:new_password',

    //     ]);

    //     $hashedPassword = Auth::user()->password;

    //     if (!Hash::check($request->old_password, $hashedPassword)) {

    //         return redirect()->back()->with('error','Old Password Doesn"t" Match');

    //     }

    //     User::whereId(auth()->user()->id)->update([

    //         'password' => Hash::make($request->new_password)

    //     ]);

    //     return redirect()->back()->with('status','Password Changed Succesfully');

    // }

    // public function AdminLogoutPage(){

    //     return view('admin.admin_logout');

    // }

    // public function AdminLogout(Request $request){

    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     $notification = array(

    //         'message' => 'Logout Successfuly',

    //         'alert-type' => 'info'

    //     );

    //     return redirect()->route('admin.logout.page')->with($notification);

    // }

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

            // assignRole() adalah fungsi dari laravel spattie

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

            // assignRole() adalah fungsi dari laravel spattie

            $user->assignRole($request->role);

        }

        $notification = array(

            'message' => 'Admin Update Successful',

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

}
