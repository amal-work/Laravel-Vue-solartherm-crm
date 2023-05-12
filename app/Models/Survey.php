<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function sap()
    {
        return $this->belongsTo(Sap::class);
    }
}
