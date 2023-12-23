<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\Contact\UpdateRequest;
use App\Http\Requests\Contact\StoreRequest;
use App\Services\ContactService;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{

    public function index()
    {
        $contact = Contact::first();

        if(!empty($contact)){
            return new ContactResource($contact);
        } else {
            return null;
        }

    }

    public function store(StoreRequest $request, ContactService $service)
    {
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');

        return $service->add($phone, $email, $address);
    }

    public function update(Contact $contact, UpdateRequest $request, ContactService $service)
    {
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');

        return $service->update($contact, $phone, $email, $address);

    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json(['success' => true, 'Запись удалена'], 200);
    }
}
