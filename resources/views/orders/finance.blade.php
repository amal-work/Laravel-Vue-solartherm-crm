<?php
function populate_finance($finance_key, $sap_key=null){
    global $customer;
    global $finance;

    $sap_key = $sap_key ? $sap_key : $finance_key;
    if($finance[$finance_key] !='') return $finance_key;
    return $customer[$sap_key];
}
?>
@extends('layouts.main')

@section('content')

    <form class="finance" role="form" data-toggle="validator">
        <div class="card payment-details">
            <div class="card-header">
                Payment Details
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-2">
                        <!-- Scheme -->
                        <div class="form-group">
                            {{ Form::label('system_cost', 'Scheme') }}
                            <i class="fa fa-question-circle fa-lg" aria-hidden="true" data-toggle="tooltip"
                               data-placement="right" title="The cost of the system"></i>

                            <div class="input-group">
                                <div class="input-group-addon">&pound;</div>
                                {{ Form::text('system_cost', null, array(
                                    'min'       => '0',
                                    'step'      => 'any',
                                    'id'        => 'system_cost',
                                    'class'     => 'form-control',
                                    'v-model'   => 'system_cost',
                                    'disabled'  => ''
                                )) }}
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <!-- Deposit -->
                        <div class="form-group">
                            {{ Form::label('deposit', 'Deposit') }}

                            <div class="input-group">
                                <div class="input-group-addon">&pound;</div>
                                {{ Form::number('deposit', null, array(
                                    'min'       => '0',
                                    'step'      => 'any',
                                    'id'        => 'deposit',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'v-model'   => 'deposit'
                                )) }}
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- Payment method -->
                        <div class="form-group">
                            {{ Form::label('payment_method', 'Payment Method') }}
                            {{ Form::select('payment_method', Config::get('crm.payment_methods'), 'cash',
                                array(
                                    'id'       => 'payment_method',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'payment_method'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="payment_method=='finance'">
                    <div class="col-md-4">
                        <!-- Finance Lender -->
                        <div class="form-group">
                            {{ Form::label('finance_lender', 'Finance Lender') }}
                            {{ Form::select('finance_lender', array_column(Setting::get('lenders'), 'readable_name', 'name'), 'solarthermuk_funding',
                                array(
                                    'id'       => 'finance_lender',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'finance.finance_lender'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <!-- Months -->
                        <div class="form-group">
                            {{ Form::label('finance_period', 'Finance Period (Months)') }}
                            {{ Form::number('finance_period', 0, array(
                                'min'       => '0',
                                'step'      => 'any',
                                'id'        => 'finance_period',
                                'class'     => 'form-control',
                                'required'  => '',
                                'v-model'   => 'finance.finance_period'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <!-- Finance Rate -->
                        <div class="form-group">
                            {{ Form::label('finance_rate', 'Finance Rate') }}
                            {{ Form::number('finance_rate', 0, array(
                                'min'       => '0',
                                'step'      => 'any',
                                'id'        => 'finance_rate',
                                'class'     => 'form-control',
                                'required'  => '',
                                'v-model'   => 'finance.finance_rate'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        Silvercrest Energy Limited trading as Solartherm, authorised and regulated by the Financial
                        Conduct Authority. We are a Credit Broker and not a Lender. We offer credit facilities from a
                        panel of lenders.
                    </div>
                </div>
            </div>
        </div>
        <div v-if="payment_method=='finance'">
            <div class="card customer-details">
                <div class="card-header">
                    Finance Application
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Title -->
                            <div class="form-group">
                                {{ Form::label('title', 'Title') }}
                                {{ Form::select('title', Config::get('crm.english_honorifics'), null, array(
                                    'id'                => 'title',
                                    'class'             => 'form-control',
                                    'required'          => '',
                                    'maxlength'         => '100',
                                    'v-model'           => 'finance.title'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Forename -->
                            <div class="form-group">
                                {{ Form::label('first_name', 'First name') }}
                                {{ Form::text('first_name', null, array(
                                    'id'                => 'first_name',
                                    'class'             => 'form-control',
                                    'required'          => '',
                                    'maxlength'         => '100',
                                    'v-model'           => 'finance.first_name'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Surname -->
                            <div class="form-group">
                                {{ Form::label('last_name', 'Last name') }}
                                {{ Form::text('last_name', null, array(
                                    'id'                => 'last_name',
                                    'class'             => 'form-control',
                                    'required'          => '',
                                    'maxlength'         => '100',
                                    'v-model'           => 'finance.last_name'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Gender -->
                            <div class="form-group">
                                {{ Form::label('gender', 'Gender') }}
                                {{ Form::select('gender', array(
                                        'm'      => 'Male',
                                        'f'    => 'Female',
                                        'o'     => 'Other'
                                        ), 'male',
                                    array(
                                        'id'      => 'gender',
                                        'class'   => 'form-control',
                                        'required' => '',
                                        'v-model'   => 'finance.gender'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Date of Birth -->
                            <div class="form-group">
                                {{ Form::label('dob', 'Date of Birth') }}
                                {{ Form::date('dob', null, array(
                                    'id'        => 'dob',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'v-model'   => 'finance.dob'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Maiden Name -->
                            <div class="form-group">
                                {{ Form::label('maiden_name', 'Maiden Name') }}
                                {{ Form::text('maiden_name', null, array(
                                    'id'        => 'maiden_name',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '255',
                                    'v-model'   => 'finance.maiden_name'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Marital Status -->
                            <div class="form-group">
                                {{ Form::label('marital_status', 'Marital Status') }}
                                {{ Form::text('marital_status', null, array(
                                    'id'        => 'marital_status',
                                    'class'     => 'form-control',
                                    'maxlength' => '15',
                                    'v-model'   => 'finance.marital_status'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Nationality -->
                            <div class="form-group">
                                {{ Form::label('nationality', 'Nationality') }}
                                {{ Form::select('nationality', Setting::get('countries'), null,
                                    array(
                                        'id'      => 'nationality',
                                        'class'   => 'form-control',
                                        'required' => '',
                                        'v-model'   => 'finance.nationality'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Number of Dependants -->
                            <div class="form-group">
                                {{ Form::label('dependants', 'Number of Dependants') }}
                                {{ Form::number('dependants', 1, array(
                                    'min'       => '1',
                                    'id'        => 'dependants',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.dependants'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <!-- Home Phone -->
                                <div class="form-group">
                                    {{ Form::label('landline_phone', 'Landline Phone') }}
                                    {{ Form::text('landline_phone', 1, array(
                                        'min'       => '1',
                                        'id'        => 'landline_phone',
                                        'class'     => 'form-control',
                                        'required'  => '',
                                        'maxlength' => '50',
                                        'v-model'   => 'finance.landline_phone'
                                    )) }}
                                    <div class="help-block with-errors"></div>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Mobile Phone -->
                            <div class="form-group">
                                {{ Form::label('mobile_phone', 'Mobile Phone') }}
                                {{ Form::text('mobile_phone', 1, array(
                                    'min'       => '1',
                                    'id'        => 'mobile_phone',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.mobile_phone'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Email -->
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', null, array(
                                    'id'        => 'email',
                                    'class'     => 'form-control',
                                    'maxlength' => '100',
                                    'v-model'   => 'finance.email'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Time at current address -->
                            <div class="form-group">
                                {{ Form::label('time_at_address', 'Time at address (years)') }}
                                {{ Form::number('time_at_address', 1, array(
                                    'min'       => '1',
                                    'id'        => 'mobitime_at_addressle_phone',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.time_at_address'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- HouseNumber/Name -->
                            <div class="form-group">
                                {{ Form::label('house_name', 'House Number / Name') }}
                                {{ Form::text('house_name', null, array(
                                    'id'        => 'house_name',
                                    'class'     => 'form-control',
                                    'maxlength' => '100',
                                    'v-model'   => 'finance.house_name'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Street -->
                            <div class="form-group">
                                {{ Form::label('street', 'Street') }}
                                {{ Form::text('street', null, array(
                                    'id'        => 'street',
                                    'class'     => 'form-control',
                                    'maxlength' => '100',
                                    'v-model'   => 'finance.street'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Town -->
                            <div class="form-group">
                                {{ Form::label('town', 'Town') }}
                                {{ Form::text('town', null, array(
                                    'id'        => 'town',
                                    'class'     => 'form-control',
                                    'maxlength' => '100',
                                    'v-model'   => 'finance.town'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- County -->
                            <div class="form-group">
                                {{ Form::label('county', 'County') }}
                                {{ Form::select('county', Setting::get('counties'), null,
                                    array(
                                        'id'      => 'county',
                                        'class'   => 'form-control',
                                        'required' => '',
                                        'v-model'   => 'finance.county'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Postcode -->
                            <div class="form-group">
                                {{ Form::label('postcode', 'Postcode') }}
                                {{ Form::text('postcode', null, array(
                                    'id'        => 'postcode',
                                    'class'     => 'form-control',
                                    'maxlength' => '100',
                                    'v-model'   => 'finance.postcode'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Property Value -->
                            <div class="form-group">
                                {{ Form::label('property_value', 'Property Value') }}
                                {{ Form::number('property_value', 1, array(
                                    'min'       => '1',
                                    'id'        => 'property_value',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.property_value'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Employment status -->
                            <div class="form-group">
                                {{ Form::label('employment_status', 'Employment status') }}
                                {{ Form::select('employment_status', Config::get('crm.employment_statuses'), null,
                                    array(
                                        'id'      => 'employment_status',
                                        'class'   => 'form-control',
                                        'required' => '',
                                        'v-model'   => 'finance.employment_status'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Annual Gross Income-->
                            <div class="form-group">
                                {{ Form::label('annual_gross_income', 'Annual Gross Income') }}
                                {{ Form::number('annual_gross_income', 1, array(
                                    'min'       => '1',
                                    'id'        => 'annual_gross_income',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.annual_gross_income'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Current Debts
                        </div>
                        <div class="card-block">
                            <div class="form-group">
                                {{ Form::label('current_debts', 'Total debts') }}
                                {{ Form::number('current_debts', null, array(
                                    'min'       => '1',
                                    'id'        => 'current_debts',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.current_debts'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card mortgage">
                        <div class="card-header">
                            Mortgage
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Outstanding Mortgage Amount -->
                                    <div class="form-group">
                                        {{ Form::label('outstanding_mortgage', 'Outstanding Mortgage Amount') }}
                                        {{ Form::number('outstanding_mortgage', 1, array(
                                            'min'       => '1',
                                            'id'        => 'outstanding_mortgage',
                                            'class'     => 'form-control',
                                            'required'  => '',
                                            'v-model'   => 'finance.outstanding_mortgage'
                                        )) }}
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Monthly Mortgage Amount -->
                                    <div class="form-group">
                                        {{ Form::label('monthly_mortgage', 'Monthly Mortgage Amount') }}
                                        {{ Form::number('monthly_mortgage', 1, array(
                                            'min'       => '1',
                                            'id'        => 'monthly_mortgage',
                                            'class'     => 'form-control',
                                            'required'  => '',
                                            'maxlength' => '50',
                                            'v-model'   => 'finance.monthly_mortgage'
                                        )) }}
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card address-history">
                        <div class="card-header">
                            Address History
                        </div>

                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Previous Addresses -->
                                    <div class="form-group">
                                        {{ Form::label('previous_addresses', 'Previous Addresses (NB We must have a full three year history)') }}
                                        {{ Form::textarea('previous_addresses', 1, array(
                                            'min'       => '1',
                                            'id'        => 'previous_addresses',
                                            'class'     => 'form-control',
                                            'required'  => '',
                                            'maxlength' => '50',
                                            'v-model'   => 'finance.previous_addresses'
                                        )) }}
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Time at previous address -->
                                    <div class="form-group">
                                        {{ Form::label('previous_addresses_time', 'Time at previous address (years)') }}
                                        {{ Form::number('previous_addresses_time', 1, array(
                                            'min'       => '1',
                                            'id'        => 'previous_addresses_time',
                                            'class'     => 'form-control',
                                            'required'  => '',
                                            'maxlength' => '50',
                                            'v-model'   => 'finance.previous_addresses_time'
                                        )) }}
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bank-details">
                <div class="card-header">
                    Bank Details
                </div>

                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bank Name -->
                            <div class="form-group">
                                {{ Form::label('bank_name', 'Bank Name') }}
                                {{ Form::text('bank_name', null, array(
                                    'min'       => '1',
                                    'id'        => 'bank_name',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.bank_name'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>

                            <!-- Account Number -->
                            <div class="form-group">
                                {{ Form::label('account_number', 'Account Number') }}
                                {{ Form::number('account_number', null, array(
                                    'min'       => '1',
                                    'id'        => 'account_number',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.account_number'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>

                            <!-- Sort Code -->
                            <div class="form-group">
                                {{ Form::label('sort_code', 'Sort Code') }}
                                {{ Form::text('sort_code', null, array(
                                    'min'       => '1',
                                    'id'        => 'sort_code',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.sort_code'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>

                            <!-- Time with bank -->
                            <div class="form-group">
                                {{ Form::label('time_with_bank', 'Time with bank') }}
                                {{ Form::number('time_with_bank', null, array(
                                    'min'       => '1',
                                    'id'        => 'time_with_bank',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.time_with_bank'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>

                            <!-- Loan Amount -->
                            <div class="form-group">
                                {{ Form::label('loan_amount', 'Loan Amount') }}
                                {{ Form::number('loan_amount', null, array(
                                    'min'       => '1',
                                    'id'        => 'loan_amount',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '50',
                                    'v-model'   => 'finance.loan_amount'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>

                            <!-- Notes -->
                            <div class="form-group">
                                {{ Form::label('notes', 'Notes') }}
                                {{ Form::textarea('notes', null, array(
                                    'min'       => '1',
                                    'id'        => 'notes',
                                    'class'     => 'form-control',
                                    'required'  => '',
                                    'maxlength' => '500',
                                    'v-model'   => 'finance.notes'
                                )) }}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('orders._bottom_bar')
@endsection

@section('custom_styles')

@endsection
@section('custom_script')

    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                nextPage: function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: '{{Request::url()}}',
                        method: 'POST',
                        data: this.$data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function (response) {
                        if (response.errors) {
                            var error_content = "";
                            $.each(response.errors, function (i, error) {
                                error_content += "<li>"+error+"</li>";
                            });
                            iziToast.error({message: error_content});
                        }
                        if (response.success) window.location.replace("{{url('/orders/'.$order->id.'/confirmation')}}");
                    });
                }
            },
            data: {
                payment_method: '{{$order['payment_method']}}',
                system_cost: '{{number_format($order->sap->system->system_cost, 2)}}',
                deposit: '{{$order['deposit']}}',
                finance: {
                    finance_lender: '{{$finance['finance_lender']}}',
                    finance_period: '{{$finance['finance_period']}}',
                    finance_rate: '{{$finance['finance_rate']}}',

                    title : '{{populate_finance('title')}}',
                    first_name : '{{populate_finance('first_name')}}',
                    last_name : '{{populate_finance('last_name')}}',
                    gender : '{{$finance['gender']}}',
                    dob : '{{$finance['dob']}}',
                    maiden_name : '{{$finance['maiden_name']}}',
                    marital_status : '{{$finance['marital_status']}}',
                    nationality : '{{$finance['nationality']}}',
                    dependants : '{{$finance['dependants']}}',
                    landline_phone : '{{$finance['landline_phone']}}',
                    mobile_phone : '{{$finance['mobile_phone']}}',
                    email : '{{$finance['email']}}',
                    time_at_address : '{{$finance['time_at_address']}}',
                    house_name : '{{$finance['house_name']}}',
                    street : '{{$finance['street']}}',
                    town : '{{populate_finance('town')}}',
                    county : '{{populate_finance('county')}}',
                    postcode : '{{populate_finance('postcode')}}',
                    property_value : '{{$finance['property_value']}}',
                    employment_status : '{{$finance['employment_status']}}',
                    annual_gross_income : '{{$finance['annual_gross_income']}}',
                    current_debts : '{{$finance['current_debts']}}',
                    outstanding_mortgage : '{{$finance['outstanding_mortgage']}}',
                    monthly_mortgage : '{{$finance['monthly_mortgage']}}',
                    previous_addresses : '{{$finance['previous_addresses']}}',
                    previous_addresses_time : '{{$finance['previous_addresses_time']}}',
                    bank_name : '{{$finance['bank_name']}}',
                    account_number : '{{$finance['account_number']}}',
                    sort_code : '{{$finance['sort_code']}}',
                    time_with_bank : '{{$finance['time_with_bank']}}',
                    loan_amount : '{{$finance['loan_amount']}}',
                    notes : '{{$finance['notes']}}'
                }
            }
        });
    </script>
@endsection