<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Http\Requests\StoreContactRequest;


class ContactController extends Controller
{

    public function __construct(public ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        return $this->contactService->getContacts();
    }

    public function getByLocation()
    {
        return $this->contactService->getByLocation();
    }

    public function getLocationInfoReport()
    {
        return $this->contactService->getLocationInfoReport();
    }

    public function show($id)
    {
        return $this->contactService->show($id);
    }

    public function create(StoreContactRequest $request)
    {
        return $this->contactService->create($request);
    }

    public function update(StoreContactRequest $request, $id)
    {
        return $this->contactService->update($request, $uuid);
    }

    public function delete($id)
    {
        return $this->contactService->delete($id);
    }

}
