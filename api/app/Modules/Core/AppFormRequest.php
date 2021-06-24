<?php

namespace Modules\Core;

use Illuminate\Foundation\Http\FormRequest;

class AppFormRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [];
    }
}
