<?php

namespace Modules\Core\Users\Requests;

use Modules\Core\AppFormRequest;

class DestroyUser extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['users.module', 'users.destroy']);
        return true;
    }

    public function rules()
    {
        return [];
    }
}
