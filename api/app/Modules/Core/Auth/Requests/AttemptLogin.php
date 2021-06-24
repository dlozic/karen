<?php

namespace Modules\Core\Auth\Requests;

use Modules\Core\AppFormRequest;

class AttemptLogin extends AppFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ];
    }
}
