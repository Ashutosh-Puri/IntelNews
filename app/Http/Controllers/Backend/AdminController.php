<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Backend\AdminFormRequest;
use App\Http\Requests\Backend\ProfileFormRequest;
use App\Http\Requests\Backend\PasswordChangeFormRequest;

class AdminController extends Controller
{
    

    public function AdminLogin(){

        return view('admin.admin_login');

    }

    public function AdminDashboard(){

        return view('admin.index');

    }

    public function AdminProfile(){

        $adminData = User::find(Auth::user()->id);

        return view('admin.admin_profile_view',compact('adminData'));

    }

    public function AdminProfileStore(ProfileFormRequest $request){

        $data =  User::find(Auth::user()->id);

        $data->name         = $request->name;
        $data->username     = $request->username;
        $data->email        = $request->email;
        $data->phone        = $request->phone;

            if($request->hasFile('photo')){
                $photo = $request->file('photo');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                Image::make($photo)->resize(300, 300)->save(public_path('upload/admin_images/'.$filename));
                $photoPath = 'upload/admin_images/'.$filename;
                $data->photo= $photoPath;
            }
        $data->update();

        $notification = array(

            'message' => 'Admin Profile Update Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('admin.profile')->with($notification);

    }

    public function AdminChangePassword(){

        return view('admin.admin_change_password');

    }

    public function AdminUpdatePassword(PasswordChangeFormRequest $request){

        $hashedPassword = Auth::user()->password;

        if (!Hash::check($request->old_password, $hashedPassword)) {

            return redirect()->back()->with('error','Old Password Doesn"t" Match');

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

    public function AdminLogoutPage(){

        return view('admin.admin_logout');

    }

    public function AdminLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'Logout Successfuly',

            'alert-type' => 'info'

        );

        return redirect()->route('admin.logout.page')->with($notification);

    }

    public function AllAdmin(){

        $alladminuser = User::where('role','admin')->latest()->get();

        return view('backend.admin.all_admin',compact('alladminuser'));

    }

    public function AddAdmin(){

        $roles = Role::all();

        return view('backend.admin.add_admin',compact('roles'));

    }

    public function StoreAdmin(AdminFormRequest $request){

        $user = new User();

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'inactive';

        $user->save();

        if ($request->role) {

            // assignRole()    laravel spattie

            $user->assignRole($request->role);

        }

        $notification = array(

            'message' => 'New Added Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.admin')->with($notification);

    }

    public function EditAdmin($id){

        $roles = Role::all();

        $adminuser = User::findOrFail($id);

        return view('backend.admin.edit_admin',compact('adminuser','roles'));

    }

    public function UpdateAdmin(AdminFormRequest $request ,$id){

        dd($request ,$id);
        

        $user = User::findOrFail($id);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'active';

        $user->save();

        $user->roles()->detach();

        if ($request->role) {

            // assignRole()   laravel spattie

            $user->assignRole($request->role);

        }

        $notification = array(

            'message' => 'Admin Update Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.admin')->with($notification);

    }

    public function DeleteAdmin($id){

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

    public function InactiveAdminUser($id){

        User::findOrFail($id)->update([

            'status' => 'inactive',

        ]);

        $notification = array(

            'message' => 'Inactivated User Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

    public function ActiveAdminUser($id){

        User::findOrFail($id)->update([

            'status' => 'active',

        ]);

        $notification = array(

            'message' => 'Activated User Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }


    public function AdminDeleteProfilePhoto($id){

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
