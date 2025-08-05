<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactNotification;
use App\Mail\ContactReply;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    /* User Panel */
    public function contact()
    {
        return view('user.contact');
    }

    public function add_contactform(ContactFormRequest $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        // Send notification to admin
        Mail::to('admin@example.com')->send(new ContactNotification($contact));

        return redirect()->back()->with('message', 'Your message has been sent!');
    }

    /* Admin Panel */
    public function contact_forms()
    {
        $data = Contact::all();

        if (Auth::id() && Auth::user()->typeUser == '1') {
            return view('admin.contact', compact('data'));
        }

        return redirect('login')->with('message', 'Unauthorized access');
    }

    public function delete_forms($id)
    {
        $data = Contact::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', "The message from {$data->email} has been deleted.");
        }

        return redirect()->back()->with('error', 'Message not found.');
    }

    public function respond(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string|max:5000',
        ]);

        $contact = Contact::findOrFail($id);

        // Save the response to the database
        $contact->response = $request->response;
        $contact->save();

        // Send response email to the user
        Mail::to($contact->email)->send(new ContactReply($contact, $request->response));

        return redirect()->back()->with('message', 'Your response has been sent to the user.');
    }
}