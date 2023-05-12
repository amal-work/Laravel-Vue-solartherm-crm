@extends('layouts.main')
@section('content')

    <div class="card compliance">
        <div class="card-header">
            Compliance
        </div>

        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Customer Name</td>
                            <td>{{$order->sap->property->first_name}} {{$order->sap->property->last_name}}</td>
                        </tr>
                        <tr>
                            <td>District Accessor</td>
                            <td>{{Auth::user()->full_name}}</td>
                        </tr>
                        <tr>
                            <td>I confirm I have had a full explanation of the products/goods and the installation being
                                offered, and understand all aspects.
                            </td>
                            <td>{{ Form::checkbox('confirm_explain_installation', null, null, ['required'=>'']) }}</td>
                        </tr>
                        @if($order->payment_method == 'finance')
                            <tr>
                                <td>I confirm that all the information on the credit application is accurate and I am
                                    not aware of any change in circumstances that would affect my ability to repay this
                                    loan.
                                </td>
                                <td>{{ Form::checkbox('confirm_information_accurate') }}</td>
                            </tr>
                            <tr>
                                <td>I confirm that I will pay the credit by making 120 monthly payments of £143.43 Total
                                    amount payable £17311.6
                                </td>
                                <td>{{ Form::checkbox('confirm_credit') }}</td>
                            </tr>
                            <tr>
                                <td>I understand that I must pay the minimum monthly repayment by direct debit but
                                    additional capital repayments can be made.
                                </td>
                                <td>{{ Form::checkbox('confirm_minimum_repayments') }}</td>
                            </tr>
                            <tr>
                                <td>I can confirm my annual gross income is £35,000.00</td>
                                <td>{{ Form::checkbox('confirm_gross_income') }}</td>
                            </tr>
                            <tr>
                                <td>I understand how the loan works and the requirement to make repayments is not
                                    affected in any way by the benefits or savings that any installation/product
                                    generates.
                                </td>
                                <td>{{ Form::checkbox('confirm_loan') }}</td>
                            </tr>
                            <tr>
                                <td>I was given the opportunity to ask questions about the loan and understood all the
                                    answers provided.
                                </td>
                                <td>{{ Form::checkbox('confirm_questions') }}</td>
                            </tr>
                            <tr>
                                <td>I understand that SolarTherm UK is part of the Silvercrest Energy group and they try
                                    to obtain funding for my Solar PV Order. I understand they will advise me who they
                                    were able to obtain funding from, and arrange for this funding company to contact me
                                    to finalise funds. I understand that should I not to proceed with the funding, I
                                    must inform Solar Therm and cancel my order within 14 days of the date below.
                                </td>
                                <td>{{ Form::checkbox('confirm_funding') }}</td>
                            </tr>
                        @else
                            <tr>
                                <td>I confirm that I will pay the total amount payable
                                    £{{number_format($order->sap->system->system_cost, 2)}}</td>
                                <td>{{ Form::checkbox('confirm_amount_payable') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    I Understand/Have Received The Following Information
                </div>

                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Solar PV Performance Estimate (Part 1 + 2)</td>
                                    <td>{{ Form::checkbox('performance_estimate') }}</td>
                                </tr>
                                <tr>
                                    <td>Solar PV Quote &amp; Order Form (Part 1 + 2)</td>
                                    <td>{{ Form::checkbox('quote_order') }}</td>
                                </tr>
                                <tr>
                                    <td>Terms &amp; Conditions (Part 3)</td>
                                    <td>{{ Form::checkbox('terms_conditions') }}</td>
                                </tr>
                                <tr>
                                    <td>Warranty &amp; Guarantee (Part 4)</td>
                                    <td>{{ Form::checkbox('warranty_guarantee') }}</td>
                                </tr>
                                <tr>
                                    <td>Smarter Solar Booklet</td>
                                    <td>{{ Form::checkbox('smarter_solar_booklet') }}</td>
                                </tr>
                                <tr>
                                    <td>HIES Leaflet</td>
                                    <td>{{ Form::checkbox('hies_leaflet') }}</td>
                                </tr>
                                <tr>
                                    <td>The company is a member of MCS and HIES</td>
                                    <td>{{ Form::checkbox('mcs_hies') }}</td>
                                </tr>
                                <tr>
                                    <td>My information may need to be shared with third parties for
                                        registration/marketing
                                        purposes
                                    </td>
                                    <td>{{ Form::checkbox('third_parties') }}</td>
                                </tr>
                                <tr>
                                    <td>That I am required to apply for the Government FIT scheme after completion of my
                                        installation.
                                    </td>
                                    <td>{{ Form::checkbox('government_fit') }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Order documents
                </div>
                <div class="card-block">
                    <a href="{{url('orders/'.$order->id.'/pdf?download=true')}}" class="btn btn-success">Order PDF</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Signature
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                {{ Form::checkbox('confirm_order') }}
                                {{ Form::label('confirm_order', 'I confirm I wish to place the order.') }}
                                <br/>
                                {{ Form::checkbox('confirm_tnc') }}
                                {{ Form::label('confirm_tnc', 'I accept the terms and conditions.') }}
                                <br/>
                                {{ Form::checkbox('assessment_completed') }}
                                {{ Form::label('assessment_completed', 'I confirm I have completed this assessment and had approval from the customer to process to order.') }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group" v-if="!customer_signed_at">
                                {{Form::text('customer_signature', null, ['class'=> 'form-control', 'v-model'=> 'customer_signature'])}}
                                <span class="input-group-append">
                                    {{Form::button('Sign <i class="fa fa-pencil"></i>', ['class'=>'btn btn-primary', 'v-on:click'=>"signature('customer')"])}}
                                </span>
                            </div>
                            <div v-if="customer_signed_at">
                                <p>Customers Signature: <br/> <span class="signature">@{{customer_signature}}</span></p>
                                <p>Date: @{{ customer_signed_at }}<br/>IP address: @{{ customer_signed_ip }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group" v-if="!assessor_signed_at">
                                {{Form::text('assessor_signature', null, ['class'=>'form-control', 'v-model'=> 'assessor_signature'])}}
                                <span class="input-group-append">
                                    {{Form::button('Sign <i class="fa fa-pencil"></i>', ['class'=>'btn btn-primary', 'v-on:click'=>"signature('assessor')"])}}
                                </span>
                            </div>
                            <div v-if="assessor_signed_at">
                                <p>Accessor Signature: <br/> <span class="signature">@{{ assessor_signature }}</span></p>
                            <p>Date: @{{ assessor_signed_at }}<br/>IP address: @{{ assessor_signed_ip }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('orders._bottom_bar')
@endsection
@section('custom_styles')
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <style>
        .signature{font-family: 'Leckerli One', cursive;font-size:1.5em;}
    </style>
@endsection

@section('custom_script')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                'customer_signature': '{{$order->customer_signature}}',
                'customer_signed_at': '{{$order->customer_signed_at}}',
                'customer_signed_ip': '{{$order->customer_signed_ip}}',

                'assessor_signature': '{{$order->assessor_signature}}',
                'assessor_signed_at': '{{$order->assessor_signed_at}}',
                'assessor_signed_ip': '{{$order->assessor_signed_ip}}',
            },
            methods: {
                nextPage: function(){
                    window.location.replace("{{url('/orders/'.$order->id)}}")
                },
                signature: function(stype){
                    var post_data = (stype == 'customer') ? {'customer_signature': this.customer_signature} : {'assessor_signature': this.assessor_signature};
                    $.ajax({
                        url: '{{url('orders/'.$order->id.'/sign')}}',
                        method: 'POST',
                        data: post_data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function(data){
                        if(stype == 'customer'){
                            app.customer_signature = data.customer_signature;
                            app.customer_signed_at = data.customer_signed_at;
                            app.customer_signed_ip = data.customer_signed_ip;
                        }

                        if(stype == 'assessor'){
                            app.assessor_signature = data.assessor_signature;
                            app.assessor_signed_at = data.assessor_signed_at;
                            app.assessor_signed_ip = data.assessor_signed_ip;
                        }
                    })
                }
            }
        });
    </script>
@endsection