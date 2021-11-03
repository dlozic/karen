<?php

namespace Modules\Core\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Modules\Core\AppModel;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Acl\Role;
use Modules\Core\AppLanguages\AppLanguage;
use Modules\Core\Files\AppFile;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends AppModel implements
    AuthenticatableContract,
    AuthorizableContract,
    JWTSubject
{
    use SoftDeletes;
    use Notifiable, Authenticatable, Authorizable;

    protected $table = 'app_users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_active',
        'role_id',
        'timezone_id',
        'language_id'
    ];

    protected $hidden = [
        'password',
        'deleted_at'
    ];

    public function role() { return $this->belongsTo(Role::class); }
    public function language() { return $this->belongsTo(AppLanguage::class); }
    public function profileImage() { return $this->morphOne(AppFile::class, 'fileable'); }

    public function setPasswordAttribute($raw)
    {
        $this->attributes['password'] = Hash::make($raw);
    }

    public function toggleActivation()
    {
        $this->is_active = !$this->is_active;
        return $this;
    }

    /* jwt */
    public function getJWTIdentifier() { return $this->getKey(); }
    public function getJWTCustomClaims() { return []; }
}
