<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SubscriberNotification;
use App\Http\Requests\Backend\SubscriberFormRequest;

class SubscriberController extends Controller
{
    public function AllSubscriber(){
        $subscriber = Subscriber::all();
        return view('backend.subscriber.all_subscriber',compact('subscriber'));
    }

    public function AddSubscriber(){
        return view('backend.subscriber.add_subscriber');
    }

    public function StoreSubscriber(SubscriberFormRequest $request){
        $role = Subscriber::create([
            'email'     => $request->email,            
        ]);
        $notification = array(
            'message' => 'Subscriber Added Successfuly',
            'alert-type' => 'success'
        );

        $user = User::where('role','admin')->get();
        Notification::send($user, new SubscriberNotification($request));
        return redirect()->route('all.subscriber')->with($notification);
    }

    public function EditSubscriber($id){
        $subscriber = Subscriber::findOrFail($id);
        return view('backend.subscriber.edit_subscriber',compact('subscriber'));
    }

    public function UpdateSubscriber(SubscriberFormRequest $request,$id){
        $role = Subscriber::findOrFail($id)->update([
            'email'     => $request->email,
        ]);
        $notification = array(
            'message' => 'Subscriber Updated Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subscriber')->with($notification);
    }

    public function DeleteSubscriber($id){
        Subscriber::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subscriber Deleted Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
