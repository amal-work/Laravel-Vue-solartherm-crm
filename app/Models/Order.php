<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'lead_id',
        'sap_id',

        'appointment_at',
        'deposit',
        'payment_method',

        'finance_completed_at'.

        'customer_signature',
        'customer_signed_at',
        'customer_signed_ip',

        'assessor_signature',
        'assessor_signed_at',
        'assessor_signed_ip',

        'completed_at',
        'signed_at',
        'status',
        'notes',
        'created_at',
        'updated_at'
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function sap()
    {
        return $this->belongsTo(Sap::class);
    }
}
