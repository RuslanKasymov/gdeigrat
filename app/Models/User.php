<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'date_of_birth',
        'avatar',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $followers = 0;
    protected $maintainers = 0;
    protected $is_follower = false;

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function getFollowersCount()
    {
        return $this->followers;
    }

    public function setFollowersCount($value)
    {
        $this->followers = $value;
    }

    public function getMaintainersCount()
    {
        return $this->maintainers;
    }

    public function setMaintainersCount($value)
    {
        $this->maintainers = $value;
    }

    public function getIsFollowerFlag()
    {
        return $this->is_follower;
    }

    public function setIsFollowerFlag($value)
    {
        $this->is_follower = $value;
    }

    public function followers()
    {
        return $this->hasMany(Follower::class);
    }
}
