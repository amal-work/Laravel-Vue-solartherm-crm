<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'phone', 'email', 'postcode', 'source_id'];
    protected $appends = ['status', 'booked', 'attributes'];

    protected $casts = [
        'data' => 'json'
    ];

    protected $dates = ['deleted_at'];

    public function source()
    {
        return $this->belongsTo(LeadSource::class);
    }

    public function marks(){
        return $this->hasMany(LeadMark::class);
    }

    public function allocations()
    {
        return $this->hasMany(LeadAllocation::class)->where("active", true);
    }

    public function saps()
    {
        return $this->hasMany(Sap::class);
    }

    public function assessments()
    {
        return $this->hasMany(SolarPvAssessment::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function installs()
    {
        return $this->hasMany(Install::class);
    }


    public function findAttribute($key)
    {
        if(isset($this->data[$key])){
            return $this->data[$key];
        }
        return '';
    }

    public function setAttributes($attributes)
    {
        $new = $this->data;
        foreach ($attributes as $key => $value)
        {
            if($value){
                $new[$key] = $value;
            }
        }
        $this->data = $new;
        $this->save();
    }


    public function getBookingAttribute()
    {
        return $this->marks()->where('type', 'booking')->exists();
    }

    public function getAllocatedAttribute()
    {
        return $this->allocations();
    }
}
