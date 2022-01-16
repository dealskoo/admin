<?php

namespace Dealskoo\Admin\Models;

use Dealskoo\Admin\Notifications\ResetAdminPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;

class Admin extends Authentication implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $appends = ['avatar_url'];

    protected $fillable = [
        'name',
        'bio',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
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

    /**
     * @param $permissionKey
     * @return bool
     */
    public function do($permissionKey)
    {

        return true;
    }
}
