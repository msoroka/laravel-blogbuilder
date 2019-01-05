<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ContactHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $handler;

    public function __construct(ContactHandler $handler)
    {
        $this->handler = $handler;
    }

    public function getAllContacts()
    {
        return view('admin.contact.index', [
            'contacts' => $this->handler->getAllContacts(),
        ]);
    } 

    public function replyContact($id)
    {
        return view('admin.contact.reply', [
            'contact' => $this->handler->getContact($id),
        ]);
    }

    public function getContactDetails($id)
    {
        return view('admin.contact.details', [
            'contact' => $this->handler->getContact($id),
        ]);
    }

    public function updateContact(Request $request, $id)
    {
        return $this->handler->updateContact($request, $id);
    }

    public function getAllContactsHistory()
    {
        return view('admin.contact.history', [
            'contacts' => $this->handler->getAllContactsHistory(),
        ]);
    } 

    public function removeContact($id)
    {
        return $this->handler->removeContact($id);
    }
}
