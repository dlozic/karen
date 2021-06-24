<?php

namespace Modules\Contacts\Requests;

use Modules\Core\AppFormRequest;

class DestroyContact extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['contacts.module', 'contacts.destroy']);
        return true;
    }

    public function rules()
    {
        return [];
    }
}
