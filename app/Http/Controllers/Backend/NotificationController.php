<?php

namespace App\Http\Controllers\Backend;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;




class NotificationController extends Controller
{
    public function AllNotification(){
        $notification = Notification::orderBy('read_at','ASC')->get();
      
        return view('backend.notification.all_notification',compact('notification'));
    }

    public function ReadNotification($id){

        // dd($id);
        $noti = Notification::where('nid',$id)->first();
        $noti->read_at=now();
        $noti->save();
        $notification = array(
            'message' => 'Notification Mark As Read Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
    public function ReadAllNotification(){


        Notification::whereNull('read_at')->update(['read_at' => now()]);

        $notification = array(
            'message' => 'Notification Mark As Read Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    

    public function DeleteNotification($id){
        Notification::where('nid',$id)->first()->delete();
        $notification = array(
            'message' => 'Notification Deleted Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //

    public function DeleteAllNotification(){
        Notification::truncate();
        $notification = array(
            'message' => 'All Notification Deleted Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //
}
