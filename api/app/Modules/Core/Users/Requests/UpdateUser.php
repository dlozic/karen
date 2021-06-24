<?php

namespace Modules\Core\Users\Requests;

use Modules\Core\AppFormRequest;

class UpdateUser extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['users.module', 'users.update']);
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
