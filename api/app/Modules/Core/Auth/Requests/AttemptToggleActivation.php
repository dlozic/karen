<?php

namespace Modules\Core\Auth\Requests;

use Modules\Core\AppFormRequest;
use Modules\Core\Exceptions\AuthException;

class AttemptToggleActivation extends AppFormRequest
{
    public function authorize()
    {
        continue_if(['auth.toggle_activation']);

        /* check if deactivating yourself */
        $userId = (int) $this->route('user');

        if($userId === auth_user('id')) { throw new AuthException('auth.failed_deactivation'); }
        return true;
    }

    public function rules()
    {
        return [];
    }
}
