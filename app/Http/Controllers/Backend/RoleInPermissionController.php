<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleInPermissionController extends Controller
{
    public function AllRolesPermission(){

        $roles = Role::all();

        return view('backend.roleinpermission.all_role_permission',compact('roles'));

    }

    public function AddRolesPermission(){

        $roles = Role::all();

        $permission = Permission::all();

        // getpermissionGroups diambil dari model User.php

        $permission_groups = User::getpermissionGroups();

        return view('backend.roleinpermission.add_role_permission',compact('roles','permission','permission_groups'));

    }

    public function StoreRolesPermission(Request $request){

        $data = array();

        $permissions = $request->permission;

        foreach($permissions as $key => $item) {

            $data['role_id']        = $request->role;
            $data['permission_id']  = $item;

            DB::table('role_has_permissions')->insert($data);

        }

        $notification = array(

            'message' => 'Role Permission Added Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.roles.permission')->with($notification);

    }

    public function EditRolesPermission($id){

        $role           = Role::findOrFail($id);

        $permission     = Permission::all();

        // getpermissionGroups diambil dari model User.php

        $permission_groups = User::getpermissionGroups();

        return view('backend.roleinpermission.edit_role_permission',compact('role','permission','permission_groups'));

    }

    public function UpdateRolesPermission(Request $request,$id){

        $role       = Role::findOrFail($id);

        $permission = $request->permission;

        if (!empty($permission)) {

            // syncPermissions() adalah fungsi dari laravel spattie.

            $role->syncPermissions($permission);

        }


        $notification = array(

            'message' => 'Role Permission Updated Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.roles.permission')->with($notification);

    }


    public function DeleteRolesPermission($id){

        $role       = Role::findOrFail($id);

        if (!is_null($role)) {

            $role->delete();

        }

        $notification = array(

            'message' => 'Role Permission Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}
