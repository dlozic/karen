<?php

namespace Modules\Core\Users\Requests;

use Modules\Core\AppFormRequest;

class GetUser extends AppFormRequest
{

    public function authorize()
    {
        continue_if(['users.module', 'users.show']);
        return true;
    }

    public function rules()
    {
        return [];
    }
}
