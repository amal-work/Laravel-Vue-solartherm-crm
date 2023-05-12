<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'team_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function leads()
    {
        if ($this->hasRole('admin')) {
            return Lead::with('allocations');
        }

        return $this->belongsToMany(Lead::class, 'lead_allocations', 'lead_id', 'user_id')->where('active', true);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }
    
}
