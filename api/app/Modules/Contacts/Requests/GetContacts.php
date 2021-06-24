<?php

namespace Modules\Contacts\Requests;

use Modules\Core\AppFormRequest;

class GetContacts extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['contacts.module', 'contacts.index']);
        return true;
    }

    public function rules()
    {
        return [];
    }
}
