<?php

namespace Modules\Core\Files;

use Illuminate\Notifications\Notifiable;
use Modules\Contacts\Contact;
use Modules\Core\AppModel;
use Modules\Core\Users\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class AppFile extends AppModel
{
    use SoftDeletes;

    protected $table = 'app_files';
    use Notifiable;

    protected $fillable = [
        'original_name',
        'disk_name',
        'mime_type',
        'file_size',
        'fileable_type',
        'fileable_id',
        'uploaded_by_id'
    ];

    protected $hidden = [
        'disk_name',
        'mime_type'
    ];

    /* used for validation */
    public static $allowedPolymorphic = [
        User::class,
        Contact::class
    ];

    /* "removes" file from the disk */
    public function cleanup()
    {
        $oldname = "files/{$this->disk_name}";
        $newname = "files/deleted_{$this->disk_name}";
        return Storage::rename($oldname, $newname);
    }
}