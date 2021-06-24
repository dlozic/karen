<?php

namespace Modules\Contacts;

use Illuminate\Support\Collection;
use Modules\Contacts\ContactRepository;
use Modules\Core\AppService;

class ContactService extends AppService
{
    /* repositories */
    protected ContactRepository $contactRepository;

    public function __construct(ContactRepository $cr) {
        $this->contactRepository = $cr;
    }

    public function myContacts(Collection $filters)
    {
        $contacts = $this->contactRepository
            ->search($filters)
            ->createdBy(auth_user('id'))
            ->paginate();

        return $contacts;
    }

    public function store($formData = [])
    {
        $formData['created_by_id'] = auth_user('id');
        $formData['owner_id'] = $formData['owner_id'] ?? $formData['created_by_id'];

        $contact = $this->contactRepository->create($formData);
        return $contact;
    }

    public function update($id, $formData = [])
    {
        $this->contactRepository
            ->update($id, $formData)
            ->save();

        return $this->contactRepository->findOrFail($id);
    }

    public function show($id)
    {
        $contact = $this->contactRepository->findOrFail($id);
        $contact->load(['groups']);
        return $contact;
    }

    public function destroy($id) { return $this->contactRepository->destroy($id); }
}
