<?php

namespace App\Handlers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactHandler
{
    public function getAllContacts()
    {
        return Contact::where('replied', false)->get();
    }

    public function getAllContactsHistory()
    {
        return Contact::where('replied', true)->get();
    }

    public function getContact($id)
    {
        return Contact::find($id);
    }

    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        $data = $request->only([
            'name',
            'email',
            'message',
        ]);

        $data['replied'] = false;

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $contact = Contact::create($data);

        if (!$contact) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        activity()
            ->withProperties(['Changed things:' => $contact])
            ->log('contact was created');

        flash('Thank you for contacting us, we reply to your e-mail.')->success();

        return redirect()->route('contact');
    }

    public function updateContact(Request $request, $id)
    {
        $contact = Contact::find($id);

        $validator = Validator::make($request->all(), [
            'answer' => 'required|string',
        ]);

        $data = $request->only([
            'answer',
        ]);

        $data['replied']   = true;
        $data['author_id'] = Auth::user()->id;

        if ($validator->fails()) {
            flash('Sorry, something went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $contact = $contact->fill($data);
        $id      = $contact->id;
        activity()
            ->withProperties(['Changed things:' => $contact->getDirty()])
            ->log('Contact was updated');

        $contact = $contact->update($data);

        if (!$contact) {
            flash('Sorry, someting went wrong. Please try again.')->error();

            return redirect()->back()->withInput();
        }

        $contact = $this->getContact($id);

        Mail::send([], [], function ($message) use ($contact) {
            $message->to($contact->email)
                ->subject('Reply to your contact')
                ->setBody('Hello ' . $contact->name . '. ' . $contact->author->full_name . ' was answered to you contact with: ' . $contact->answer);
        });

        flash('Success')->success();

        return redirect()->route('admin.contact.details-contact', $contact);
    }

    public function removeContact($id)
    {
        $contact = Contact::find($id);

        activity()
            ->withProperties(['Changed things:' => $contact])
            ->log('contact was removed');

        if ($contact->delete()) {
            flash('Success')->success();

            return redirect()->route('admin.contact.list-contacts');
        }

        flash('Sorry, someting went wrong. Please try again.')->error();

        return redirect()->route('admin.contact.list-contacts');
    }
}
