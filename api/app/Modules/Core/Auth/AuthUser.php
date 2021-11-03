<?php

namespace Modules\Core\Auth;

use Modules\Core\Users\User;

class AuthUser extends User
{
    public function __construct()
    {
        $user = auth()->user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        $this->timezone_id = $user->timezone_id;
        $this->language_id = $user->language_id;
    }
}