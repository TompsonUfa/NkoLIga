<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactService
{

    public function add($phone, $email, $address)
    {
        try {
            DB::beginTransaction();

            $contact = new Contact();
            $contact->phone = $phone;
            $contact->email = $email;
            $contact->address = $address;
            $contact->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => "Запись добавлена."], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e->getMessage()], 500);
        }
    }

    public function update($contact, $phone, $email, $address)
    {
            try {
                DB::beginTransaction();

                $contact->phone = $phone;
                $contact->email = $email;
                $contact->address = $address;
                $contact->save();

                DB::commit();

                return response()->json(['success' => true, 'message' => "Запись обновлена."], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['errors' => $e->getMessage()], 500);
            }
        }

}
