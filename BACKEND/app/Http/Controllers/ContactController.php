<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required'
        ]);

        $contact = Contact::create($attributes);

        Mail::to('chawbelar98@gmail.com')->
        send(new \App\Mail\contactMail(
            $contact->name, $contact->email, $contact->phone, $contact->description
        ));
        return $contact;
    }
}
