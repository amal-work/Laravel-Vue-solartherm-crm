<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\LeadAllocation;
use App\Models\LeadMark;
use App\Models\LeadSource;
use App\Models\Sap;
use App\Models\User;
use App\Models\Lead;
use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use GuzzleHttp;

use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $leads = $user->leads();

        if ($request->has('user')) {
            $leads->whereHas('allocations', function ($q) use ($request) {
                $q->where('user_id', $request->input('user'));
            });
        }

        if ($request->has('status')) {
            $leads->where('status', $request->input('status'));
        }

        if ($request->has('name')) {
            $leads->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('postcode')) {
            $leads->where('postcode', 'like', '%' . $request->input('postcode') . '%');
        }


        if ($request->has('phone')) {
            $leads->where('phone', 'like', '%' . $request->input('phone') . '%');
        }


        $leads = $leads->paginate(15);
        $users = User::all();

        return view('leads.list', compact('leads', 'users'));
    }

    public function lead(Lead $lead)
    {
        $lead->timeline = $lead->marks()->orderBy('id', 'desc')->get();
        return view('leads.timeline', compact('lead'));
    }


    public function lead_add(Request $request)
    {
        if ($request->isMethod('POST')) {

            $this->validate($request, [
                'source' => 'required|exists:lead_sources,id',
                'name' => 'required|max:255',
                'phone' => 'required_without_all:phone|max:12',
                'email' => 'required|email|max:255',
                'postcode' => 'required|max:10'
            ]);

            $lead = Lead::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'source_id' => $request->input('source'),
                'postcode' => $request->input('postcode'),
                'key' => Uuid::uuid4()
            ]);

            return redirect(url('leads/' . $lead->id));
        }

        // Load lead sources
        $sources = LeadSource::all(['id', 'name', 'site']);
        return view('leads.add', compact('sources', $sources));
    }

    public function lead_delete(Lead $lead)
    {
        $lead->delete();
        return redirect(url('/leads'));
    }

    public function update(Request $request, Lead $lead)
    {
        $lead->update($request->all());
    }

    public function mark(Request $request, Lead $lead)
    {
        $lead_mark = new LeadMark();
        $lead_mark->fill($request->all());
        $lead_mark->lead_id = $lead->id;
        $lead_mark->user_id = Auth::id();
        $lead_mark->save();

        if (in_array($request->input('type'), ['invalid_number', 'wrong_details', 'previously_contacted', 'out_of_area', 'not_interested', 'unsuitable', 'foreigner'])) {
            LeadAllocation::where('lead_id', $lead->id)
                ->update(["active" => false]);
        }

        return redirect(url('/leads'));
    }

    public function allocations(Request $request, $lead)
    {
        $users = $request->input('users', []);

        foreach ($users as $user) {
            LeadAllocation::firstOrCreate(["user_id" => $user, "lead_id" => $lead, "type" => "Telcan", "active" => true]);
        }

        LeadAllocation::where('lead_id', '=', $lead)
            ->whereNotIn('user_id', $users)
            ->update(["active" => false]);
    }

    public function assessment(Request $request, Lead $lead)
    {
        $assessments = DB::select('
            SELECT * FROM (
              SELECT `id`, `created_at`, "solar-pv" as product FROM solar_pv_assessments WHERE lead_id = ' . $lead->id . '
              UNION ALL 
              SELECT `id`, `created_at`, "hybrid-boiler" as product FROM hybrid_boiler_assessments WHERE lead_id = ' . $lead->id . '
            ) AS A ORDER BY created_at;
        ');

        return view('leads.assessments', compact('lead', 'assessments'));
    }

    public function saps(Lead $lead)
    {
        return view('leads.saps', compact('lead'));
    }

    public function orders(Lead $lead)
    {
        return view('leads.orders', compact('lead'));
    }
}
