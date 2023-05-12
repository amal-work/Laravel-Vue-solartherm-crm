<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Setting;
use Validator;

class ApiController extends Controller
{
    public function array_yield(Request $request)
    {
        $zone_matrix = Setting::get('zone_matrix');
        $validator = Validator::make($request->all(), [
            'inclination' => 'required|numeric|min:0|max:90',
            'orientation' => 'required|numeric|min:0|max:175',
            'zone' => ['required', Rule::in(array_keys($zone_matrix))]
        ]);
        if($validator->fails()) return $validator->errors();
        $inclination = $request->input('inclination');
        $orientation = $request->input('orientation');
        $zone = $request->input('zone');

        return $zone_matrix[$zone][$inclination][$orientation/5];
    }
}
