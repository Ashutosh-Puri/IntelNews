<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ContactFormRequest;

class ContactController extends Controller
{
    public function AllContact(){
        $contact = Contact::all();
        return view('backend.contact.all_contact',compact('contact'));
    }

    public function AddContact(){
        return view('backend.contact.add_contact');
    }

    public function StoreContact(ContactFormRequest $request){
        $role = Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'subject'   => $request->subject,
            'message'   => $request->message,
            
        ]);
        $notification = array(
            'message' => 'Contact Added Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.contact')->with($notification);
    }

    public function EditContact($id){
        $contact = Contact::findOrFail($id);
        return view('backend.contact.edit_contact',compact('contact'));
    }

    public function UpdateContact(ContactFormRequest $request,$id){
        $role = Contact::findOrFail($id)->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'subject'   => $request->subject,
            'message'   => $request->message,
            
        ]);
        $notification = array(
            'message' => 'Contact Updated Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.contact')->with($notification);
    }

    public function DeleteContact($id){
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Contact Deleted Successfuly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //
}
