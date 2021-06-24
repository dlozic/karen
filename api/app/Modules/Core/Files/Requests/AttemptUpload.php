<?php

namespace Modules\Core\Files\Requests;

use App\Rules\PolyExist;
use Modules\Core\AppFormRequest;
use Modules\Core\Files\AppFile;

class AttemptUpload extends AppFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fileable_type' => ['required', new PolyExist(AppFile::$allowedPolymorphic)],
            'fileable_id' => 'required|numeric',
            'file' => 'required|image'
        ];
    }
}
