<?php

namespace Modules\Core\Auth\Requests;

use Modules\Core\AppFormRequest;
use Modules\Core\Exceptions\AppConfigurationException;

class AttemptRegister extends AppFormRequest
{
    public function authorize()
    {
        /* in order for a public registration to work
         * APP_ROLE_ID_ON_PUBLIC_REGISTER in .env file has to be set
        */
        if(!env('APP_ROLE_ID_ON_PUBLIC_REGISTER', false))
        {
            throw new AppConfigurationException(
                'app.environment_error'
            );
        }
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:app_users|max:255',
            'password' => 'required|min:6',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'timezone_id' => 'required|exists:app_timezones,id',
            'language_id' => 'required|exists:app_languages,id'
        ];
    }
}
