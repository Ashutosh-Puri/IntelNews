<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Backend\RoleFormRequest;

class RoleController extends Controller{


    public function AllRoles(){

        $role = Role::all();

        return view('backend.role.all_role',compact('role'));

    }

    public function AddRoles(){

        return view('backend.role.add_role');

    }

    public function StoreRoles(RoleFormRequest $request){

        $role = Role::create([

            'name'          => $request->name,

        ]);

        $notification = array(

            'message' => 'Role Added Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.roles')->with($notification);

    }

    public function EditRoles($id){

        $roles = Role::findOrFail($id);

        return view('backend.role.edit_role',compact('roles'));

    }

    public function UpdateRoles(RoleFormRequest $request ,$id){

        $role = Role::findOrFail($id)->update([

            'name'          => $request->name,

        ]);

        $notification = array(

            'message' => 'Role Updated Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.roles')->with($notification);

    }

    public function DeleteRoles($id){

        Role::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Role Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

    
}
