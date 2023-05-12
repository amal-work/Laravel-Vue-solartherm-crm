<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadAllocation extends Model
{
    protected $fillable = ['user_id', 'lead_id', 'type'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
