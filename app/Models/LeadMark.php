<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadMark extends Model
{
    protected $fillable = ['type', 'note', 'user_id', 'event_at', 'lead_id'];
}
