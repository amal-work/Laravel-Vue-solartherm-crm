<?php

namespace App\Http\Controllers;

use App\Models\Sap;
use PDF;
use Auth;
use Config;
use Validator;
use Setting;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderFinance;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        $orders = Order::paginate(15);
        $users = User::all();

        return view('orders.list', compact('orders', 'users'));
    }

    public function add(Request $request)
    {
        $sap = Sap::findOrFail($request->input('sap_id'));
        $order = Order::create(['lead_id' => $sap->lead->id, 'sap_id'=>$sap->id, 'status'=>'new']);

        return $order;
    }


    public function show(Order $order)
    {
        if(!$order->finance_completed_at) return redirect(url('orders/'.$order->id.'/finance'));
        return view('orders.show', compact('order'));
    }

    public function pdf(Request $request, Order $order)
    {
        $print = true;
        $filename = 'Order_'.$order->id.'.pdf';

        $pdf = PDF::loadView('orders.show', compact('order', 'print'));

        if($request->input('debug')) return view('orders.show', compact('order', 'print'));
        if($request->input('download')) return $pdf->download($filename);

        return $pdf->inline($filename);
    }

    public function finance(Request $request, Order $order)
    {
        $finance_q = OrderFinance::where('order_id', $order->id);
        $finance = $finance_q->first();

        if ($request->isMethod('POST')) {
            $rules = [
                'deposit' => 'required',
                'payment_method' => 'required|in:cash,finance'
            ];

            if($request->input('payment_method') == 'finance') {
                $rules = array_merge($rules, [
                    'finance.finance_lender' => ['required', Rule::in(array_column(Setting::get('lenders'), 'name'))],
                    'finance.finance_period' => 'numeric',
                    'finance.finance_rate' => 'numeric',
                    'finance.title' => ['required', Rule::in(Config::get('crm.english_honorifics')) ],
                    'finance.first_name' => 'required|max:100',
                    'finance.last_name' => 'required|max:100',
                    'finance.gender' => 'required|in:m,f,o',
                    'finance.dob' => 'required|date',
                    'finance.maiden_name' => 'required|max:100',
                    'finance.marital_status' => 'required|max:100',
                    'finance.nationality' => ['required', Rule::in(array_keys(Setting::get('countries')))],
                    'finance.dependants' => 'required|numeric',
                    'finance.landline_phone' => 'max:15',
                    'finance.mobile_phone' => 'max:15',
                    'finance.email' => 'required|email|max:255',
                    'finance.time_at_address' => 'required|numeric',
                    'finance.house_name' => 'required|max:100',
                    'finance.street' => 'required|max:100',
                    'finance.town' => 'required|max:65',
                    'finance.county' => ['required', Rule::in(array_keys(Setting::get('counties')))],
                    'finance.postcode' => 'required|max:8',
                    'finance.property_value' => 'numeric|min:0',
                    'finance.employment_status' => Rule::in(array_keys(Config::get('crm.employment_statuses'))),
                    'finance.annual_gross_income' => 'numeric|min:0',
                    'finance.current_debts' => 'numeric|min:0',
                    'finance.outstanding_mortgage' => 'numeric|min:0',
                    'finance.monthly_mortgage' => 'numeric|min:0',
                    'finance.previous_addresses' => 'nullable',
                    'finance.previous_addresses_time' => 'nullable|numeric',
                    'finance.bank_name' => 'required|min:3|max:255',
                    'finance.account_number' => 'required|numeric',
                    'finance.sort_code' => 'required|numeric',
                    'finance.time_with_bank' => 'required|numeric|min:0',
                    'finance.loan_amount' => 'required|numeric|min:0',
                    'finance.notes' => 'nullable'
                ]);
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) return ["errors" => $validator->errors()];

            if($request->input('payment_method') == 'finance') {
                $req_data = $request->input('finance');
                $req_data['order_id'] = $order->id;

                if (!$finance) return OrderFinance::create($req_data);
                $finance_q->update($request->input('finance'));
            }

            $order->payment_method = $request->input('payment_method');
            $order->deposit = $request->input('deposit');

            if(!$order->finance_completed_at)
                $order->finance_completed_at = date('Y-m-d H:i:s');

            $order->save();
            return ["success" => true];
        }

        $customer = $order->sap->property;
        return view('orders.finance', compact('order', 'finance', 'customer'));
    }
    public function confirmation(Order $order)
    {
        return view('orders.signature', compact('order'));
    }

    public function sign(Request $request, Order $order)
    {
        $sig_data = [];

        if($request->input('customer_signature'))
        {
            $sig_data = [
                'customer_signature' => $request->input('customer_signature'),
                'customer_signed_ip' => $request->ip(),
                'customer_signed_at' => date("Y-m-d H:i:s"),
            ];

            $order->update($sig_data);
        }

        if($request->input('assessor_signature'))
        {
            $sig_data = [
                'assessor_signature' => $request->input('assessor_signature'),
                'assessor_signed_ip' => $request->ip(),
                'assessor_signed_at' => date("Y-m-d H:i:s"),
            ];

            $order->update($sig_data);
        }

        return $sig_data;
    }
}
