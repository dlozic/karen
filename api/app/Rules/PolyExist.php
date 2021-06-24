<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PolyExist implements Rule
{
    protected $allowedPolymorphic = null;

    public function __construct($allowed)
    {
        $this->allowedPolymorphic = $allowed;
    }

    public function passes($attribute, $value)
    {
        return in_array($value, $this->allowedPolymorphic);
    }

    public function message()
    {
        return __('validation.polymorphic_error');
    }
}