<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Backend\PermissionFormRequest;

class PermissionController extends Controller
{
    public function AllPermission(){
        $permissions = Permission::all();
        return view('backend.permission.all_permission',compact('permissions'));
    }

    public function AddPermission(){
        return view('backend.permission.add_permission');
    }

    public function StorePermission(PermissionFormRequest $request){
        $role = Permission::create([
            'name'          => $request->name,
            'group_name'    => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Added Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.permission.edit_permission',compact('permission'));
    }

    public function UpdatePermission(PermissionFormRequest $request,$id){
        $role = Permission::findOrFail($id)->update([
            'name'          => $request->name,
            'group_name'    => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
