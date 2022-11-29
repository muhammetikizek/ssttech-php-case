<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{

    public function __construct(public Contact $contact)
    {
        $this->contact = $contact;
    }

    public function getContacts()
    {
        return response()->json([
            'status'    => 200,
            'data'      => $this->getContactResources()
        ]);
    }

    private function getContactResources(string $filter = null)
    {
        return $this->contact->get();
    }

    public function getByLocation()
    {
        $data = [];
        $contacts = $this->contact->with('information')->get();
        foreach($contacts as $contact) {
            $data[] = [
                $contact->information->location => $contact->where('uuid', $contact->information->contact_uuid)->get(['name', 'last_name']),
            ];
        }
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    public function getLocationInfoReport()
    {
        $data = [];
        $contacts = $this->contact->with('information')->get();

        foreach ($contacts as $contact) {
            if (! empty($contact->information)) {
                $data[] = [
                    $contact->information->location => [
                        'contact_count'         => $this->contact->where('uuid', $contact->information->contact_uuid)->count(),
                        'phone_number_count'    => $this->contact->where('uuid', $contact->information->contact_uuid)->with('information')->count(),
                ]
            ];
            }
        }
       
        return response()->json([
            'status' => 200,
            'data' => collect($data)->reverse()->toArray()
        ]);
    }

    public function show(string $id)
    {
        $contact = $this->contact->where('uuid', $id)
            ->with('information')
            ->first();

        return response()->json([
            'status'=> 200,
            'data'  => $contact
        ]);
    }

    public function create($request)
    {
      
        $photo = $request->file('photo')->store('photo', 'public');

        $contact = $this->contact->create([
            "name"      => $request->input('name'),
            "last_name" => $request->input('last_name'),
            "company"   => $request->input('company'),
            "photo"     => url('/'.$photo),
        ]);

        return response()->json([
            'status'    => 200,
            'message'   => 'Created Successfully.'
        ]);

    }

    public function update($request, string $id)
    {
        $contact = $this->contact->where('uuid', $id)->with('information')->first();

        return $contact;
    }

    public function delete(string $id) 
    {
        $contact = $this->contact->where('uuid', $id)->with('information')->delete();

        return response()->json([
            'status'    => 200,
            'message'   => 'Deleted Successfully.'
        ]);
    }
    

}
