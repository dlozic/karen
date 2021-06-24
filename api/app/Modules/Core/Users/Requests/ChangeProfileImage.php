<?php

namespace Modules\Core\Users\Requests;

use Modules\Core\AppFormRequest;

class ChangeProfileImage extends AppFormRequest
{
    public function authorize()
    {
        if(is_allowed('users.change_all_profile_images'))
        {
            return true;
        }

        /* only if you are the owner */
        $targetId = (int) request()->user;
        $loggedInId = auth_user('id');

        return $targetId === $loggedInId;
    }

    public function rules()
    {
        return [
            'file' => 'required|image'
        ];
    }
}
