<?php

namespace Dealskoo\Admin\Models;

use Dealskoo\Admin\Notifications\ResetAdminPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;

class Admin extends Authentication implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $appends = ['avatar_url'];

    protected $fillable = [
        'name',
        'bio',
        'email',
        'password',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'owner' => 'boolean',
        'status' => 'boolean',
    ];

    public function getAvatarUrlAttribute()
    {
        return empty($this->avatar) ?
            Avatar::create($this->email)->toGravatar(['d' => 'identicon', 'r' => 'pg', 's' => 100]) :
            Storage::url($this->avatar);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetAdminPassword($token));
    }

    public function routeNotificationForMail($notification)
    {
        return [$this->email => $this->name];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
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
