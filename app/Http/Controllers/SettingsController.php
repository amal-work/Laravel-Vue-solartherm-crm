<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Setting;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings(Request $request)
    {
        $settings = Setting::all();
        return $settings;
    }
    
    public function settings_add(Request $request)
    {
        if($request->isMethod('post')){
            $rules = array(
                'key' => 'required',
                'value' => 'required'
            );
            $messages = array(
                'key.required' => 'please enter key',
                'value.required' => 'please enter JSON string',
            );

            $validator = \Validator::make(Input::all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::to('/settings/add')
                    ->withErrors($validator)// send back all errors to the regex form
                    ->withInput(); // send back the input
            }
            $result = json_decode($request->input('value'));
            if (json_last_error() === JSON_ERROR_NONE) {
                Settings::create([
                    'key' => $request->input('key'),
                    'value' => $request->input('value'),
                ]);
            }else{
                Session::flash('JsonError', 'Invalid JSON format');
                return Redirect::to('/settings/add')->withInput();
            }
            return redirect(url('settings'));
        }

        return view('settings.add');
    }

    public function settings_edit($id)
    {
        $settings = Settings::find($id);
        return view('settings.edit', compact('settings')); 
    }

    public function settings_update(Request $request, $id)
    {
        if($request->isMethod('post')){
            $rules = array(
                'key' => 'required',
                'value' => 'required'
            );
            $messages = array(
                'key.required' => 'please enter key',
                'value.required' => 'please enter JSON string',
            );

            $validator = \Validator::make(Input::all(), $rules, $messages);
            if ($validator->fails()) {
                return Redirect::to('/settings/'.$id)
                    ->withErrors($validator)// send back all errors to the regex form
                    ->withInput(); // send back the input
            }
            $result = json_decode($request->input('value'));
            if (json_last_error() === JSON_ERROR_NONE) {
                Settings::where('id', $id)->update([
                    'key' => $request->input('key'),
                    'value' => $request->input('value'),
                ]);
            }else{
                Session::flash('JsonError', 'Invalid JSON format');
                return Redirect::to('/settings/'.$id)->withInput();
            }
            return redirect(url('settings'));
        }
        return view('settings.settings');
    }

}
