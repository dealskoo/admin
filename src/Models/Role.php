<?php

namespace Dealskoo\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @param $permissionKey
     * @return bool
     */
    public function do($permissionKey)
    {

        return true;
    }
}
