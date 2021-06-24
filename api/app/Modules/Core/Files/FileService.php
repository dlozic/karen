<?php

namespace Modules\Core\Files;

use Modules\Core\AppService;

class FileService extends AppService
{
    public function destroy($id)
    {
        $file = AppFile::findOrFail($id);

        /* "remove" from disk + remove from database */
        $res1 = $file->cleanup();
        $res2 = AppFile::destroy($id);
        return ($res1 + $res2) === 2;
    }
}
