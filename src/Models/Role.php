<?php

namespace Dealskoo\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Role extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        'name'
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * @param $permissionKey
     * @return bool
     */
    public function canDo($permissionKey)
    {
        return $this->permissions->contains('key', $permissionKey);
    }

    public function toSearchableArray()
    {
        return $this->only([
            'name'
        ]);
    }
}
