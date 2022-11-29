<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\ContactInformation;

class ContactInformationService
{
    
    public function create($request, $uuid)
    {

        $contact = Contact::where('uuid', $uuid)->first();
        if (! $contact) {
            return response()->json([
                'status'    => 404,
                'message'   => 'Not Found!'
            ]);
        }
        $information = $contact->information()->create($request->all());

        return response()->json([
            'status'    => true,
            'message'   => 'Created Successfully.',
            'data'      => $information
        ]);
    }
    
    public function delete($uuid) 
    {
        $contact = ContactInformation::where('contact_uuid', $uuid)->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Deleted Successfully.'
        ]);
    }


}
