<?php

namespace App\Http\Controllers;

use Validator;
use Auth;
use App\Models\User;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $surveys = Survey::paginate(15);
        $users = User::all();

        return view('surveys.list', compact('surveys', 'users'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('POST')) {
            LeadMark::create([
                'type' => 'survey',
                'note' => $request->input('notes'),
                'lead_id' => $request->input('lead_id'),
                'user_id' => Auth::id(),
                'event_at' => $request->input('appointment_at')
            ]);

            $sap = Survey::create([
                'lead_id' => $request->input('lead_id'),
                'status' => 'pending',
                'appointment_at' => $request->input('appointment_at')
            ]);

            return ["data" => $sap];
        }
        return view('survey.add');
    }

    public function survey(Request $request, Survey $survey)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'status' => 'required|in:pending,booked,hold,cancelled,completed',
                'notes' => 'nullable'
            ]);

            if ($validator->passes()) {
                $survey->update([
                    'status' => $request->input('status'),
                    'notes' => $request->input('notes')
                ]);
                return $survey;
            }

            return $validator->errors();
        }
        return view('survey.survey');
    }
}
