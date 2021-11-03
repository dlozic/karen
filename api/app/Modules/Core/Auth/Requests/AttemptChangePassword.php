<?php

namespace Modules\Core\Auth\Requests;

use Modules\Core\AppFormRequest;

class AttemptChangePassword extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['auth.change_password']);

        /* compare if editing yourself */
        $userId = (int) $this->route('user');

        if($userId === auth_user('id')) { return true; }

        continue_if(['auth.change_password_to_others']);

        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6'
        ];
    }
}
