<?php

namespace Dealskoo\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function permissions()
    {
        return $this->morphMany(Permission::class, 'permission_able');
    }

    /**
     * @param $permissionKey
     * @return bool
     */
    public function do($permissionKey)
    {

        return true;
    }
}
