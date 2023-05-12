<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Lead;
use App\Models\LeadSource;
use Ramsey\Uuid\Uuid;
use Setting;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => 'exists:lead_sources,identifier',
            'name' => 'required|max:255',
            'phone' => 'required|max:12',
            'email' => 'required|email|max:255',
            'address' => 'required|max:500',
            'postcode' => 'required|max:8'
        ]);

        if($validator->passes())
        {
            $lead = Lead::create([
                'source' => $request->source,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'postcode' => $request->postcode
            ]);

            return $lead;
        }

        return $validator->errors();
    }
}
