<?php

namespace Modules\Contacts\Requests;

use Modules\Contacts\ContactService;
use Modules\Core\AppFormRequest;

class GetContact extends AppFormRequest
{
    /* services */
    protected ContactService $contactService;

    public function __construct(ContactService $cs)
    {
        $this->contactService = $cs;
    }

    public function authorize()
    {
        continue_if(['contacts.module', 'contacts.show']);

        if(is_allowed('contacts.can_manipulate_all_contacts')) { return true; }

        /* only if you are the owner */
        $contactId = (int) $this->route('contact');
        $loggedInId = auth_user('id');

        /* only show if you are the owner */
        $ownerId = $this->contactService->show($contactId)->owner_id;

        return $loggedInId === $ownerId;
    }

    public function rules()
    {
        return [];
    }
}
