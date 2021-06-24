<?php

namespace Modules\Core\Users\Requests;

use Modules\Core\AppFormRequest;

class GetUsers extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['users.module', 'users.index']);
        return true;
    }

    public function rules()
    {
        return [];
    }
}
