<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Location;
use App\Models\ContactInformation;

class LocationService
{
    
    public function getContactsByLocation()
    {
        $data = [];
        $locations = Location::get(['name']);

        foreach ($locations as $location) {

            $info = ContactInformation::where('location', $location->id)->first();
            $data[] = [
                'location'  => $location->name,
                'contacts_count'   => !empty($info) ? Contact::where('uuid', $info->contact_uuid)->count() : 0
            ];  
        }  
        return $data;
    }

    public function getLocations()
    {
        return $this->getContactsByLocation();
    }

    public function create($request, $id)
    {

        $contact = Contact::where('uuid', $id)->first();
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
    
    public function delete($id) 
    {
        $contact = ContactInformation::where('contact_uuid', $id)->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Deleted Successfully.'
        ]);
    }


}
