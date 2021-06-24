<?php

namespace Modules\Core\Users\Requests;

use Modules\Core\AppFormRequest;

class StoreUser extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['users.module', 'users.store']);
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
