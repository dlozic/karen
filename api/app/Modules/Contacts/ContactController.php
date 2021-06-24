<?php

namespace Modules\Contacts;

use Modules\Contacts\Requests\StoreContact;
use Modules\Contacts\Requests\UpdateContact;
use Modules\Core\AppController;
use Modules\Contacts\Requests\DestroyContact;
use Modules\Contacts\Requests\GetContact;
use Modules\Contacts\Requests\GetContacts;

class ContactController extends AppController
{
    /* services */
    protected ContactService $contactService;

    public function __construct(ContactService $cs)
    {
        $this->contactService = $cs;
    }

    public function index(GetContacts $request)
    {
        $filters = collect($request->all());
        $contacts = $this->contactService->myContacts($filters);
        return success($contacts);
    }

    public function store(StoreContact $request)
    {
        $raw = $request->validated();
        $contact = $this->contactService->store($raw);
        return success($contact);
    }

    public function show(GetContact $request, $contactId)
    {
        $contact = $this->contactService->show($contactId);
        return success($contact);
    }

    public function update(UpdateContact $request, $id)
    {
        $raw = $request->validated();
        $contact = $this->contactService->update($id, $raw);
        return success($contact);
    }

    public function destroy(DestroyContact $request, $id)
    {
        $this->contactService->destroy($id);
        return success();
    }

}
