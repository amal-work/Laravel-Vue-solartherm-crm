<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderFinance extends Model
{
    protected $fillable = [
        'order_id',
        'finance_lender',
        'finance_period',
        'finance_rate',
        'title',
        'first_name',
        'last_names',
        'gender',
        'dob',
        'maiden_name',
        'marital_status',
        'nationality',
        'dependants',
        'landline_phone',
        'mobile_phone',
        'email',
        'time_at_address',
        'house_name',
        'street',
        'town',
        'county',
        'postcode',
        'property_value',
        'employment_status',
        'annual_gross_income',
        'current_debts',
        'outstanding_mortgage',
        'monthly_mortgage',
        'previous_addresses',
        'previous_addresses_time',
        'bank_name',
        'account_number',
        'sort_code',
        'time_with_bank',
        'loan_amount',
        'notes',
    ];
}
