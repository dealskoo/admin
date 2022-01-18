<?php

namespace Dealskoo\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'key'
    ];

    public function permission_able()
    {
        return $this->morphTo();
    }
}
