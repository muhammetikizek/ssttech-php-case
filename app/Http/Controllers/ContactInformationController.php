<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactInformationRequest;
use App\Services\ContactInformationService;

class ContactInformationController extends Controller
{

    public function __construct(public ContactInformationService $contactInformationService)
    {
        $this->contactInformationService = $contactInformationService;
    }

    public function index()
    {
        //
    }

    public function create(StoreContactInformationRequest $request, $id)
    {
        return $this->contactInformationService->create($request, $id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        return $this->contactInformationService->delete($id);
    }
}
