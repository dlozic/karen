<?php

namespace Modules\Contacts\Requests;

use Modules\Core\AppFormRequest;

class StoreContact extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['contacts.module', 'contacts.store']);
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50'
        ];
    }
}
