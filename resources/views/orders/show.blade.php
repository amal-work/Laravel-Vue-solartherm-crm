<?php if (!isset($print)) $print = false; ?>

@extends($print ? 'layouts.print':'layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            Goods &amp; Services
        </div>

        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>Good</th>
                            <th style="width: 90px;">Quantity</th>
                        </tr>
                        @foreach($order->sap->system->products as $product)
                            <tr>
                                <td>{{$product[0]}}</td>
                                <td>{{$product[1]}}</td>
                            </tr>
                        @endforeach
                    </table>

                    <table class="table">
                        <tr>
                            <th>Service</th>
                            <th style="width: 90px;">Included</th>
                        </tr>
                        @foreach($order->sap->system->services as $service)
                            <tr>
                                <td>{{$service}}</td>
                                <td>Yes</td>
                            </tr>
                        @endforeach
                    </table>

                    @if($order->notes)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Additional Information/Equipment</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$order->notes}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Energy Provider:</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><h5>{{Setting::get('energy_providers')[$order->sap->property->energy_provider]}}</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row pure-g">
                <div class="col-md-6 pure-u-1-2">
                    <p>Please note:</p>

                    <ol>
                        <li>If you request changes that incur us additional time or cost, or if unforseen additional
                            works are required, we will provide you with a revised quote. Any additional charges will be
                            based on the installers hour rate of £30.00 + VAT
                        </li>
                        <li>We enclose a copy of terms of business/contract with this quote. Please read this
                            carefully.
                        </li>
                    </ol>

                    <p>*Please see the accompanied 'Solar PV Performance Estimate' AC Output document number
                        referenced.</p>
                </div>

                <div class="col-md-6 pure-u-1-2">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Basic MCS Sap Calculation</td>
                            <td>@{{mcs_sap_calc}}</td>
                        </tr>
                        <tr>
                            <td>Estimated Performance *</td>
                            <td>@{{estimated_performance}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Planning Permission</div>
        <div class="card-block">In most cases installing solar panels is likely to be considered "permitted development"
            however if the property is in a conservation area, the solar panels are to be ground mounted or protude
            above 200mm from the roof you will need to apply for planning permission, which may incur additional costs.
        </div>
    </div>

    <div class="card">
        <div class="card-header">Sub-contracting Installation Works</div>
        <div class="card-block">We may subcontract our some of the works, such as Scaffolding, EPC, etc. In accordance
            with the Microgeneration Certification Scheme we are responsible for ensuring that all sub-contracted works
            are carried out to standards required by MCS.
        </div>
    </div>

    <div class="card">
        <div class="card-header">Predicted Installation Date</div>
        <div class="card-block">
            We expect your solar installation to be completed no later than 3 weeks from the date of
            signing this contract.
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Contract Order Form
        </div>

        <div class="card-block">
            <div class="row pure-g">
                <div class="col-sm-4 pure-u-1-3">
                    <dl>
                        <dt>First name</dt>
                        <dd>{{$order->sap->property->first_name}}</dd>

                        <dt>Last name</dt>
                        <dd>{{$order->sap->property->last_name}}</dd>
                    </dl>
                </div>
                <div class="col-sm-4 pure-u-1-3">
                    <dl>
                        <dt>Address</dt>
                        <dd>{{$order->sap->property->address_1}}<br/>
                            {{$order->sap->property->address_2}}<br/>
                            {{$order->sap->property->address_3}}
                        </dd>

                        <dt>Town</dt>
                        <dd>{{$order->sap->property->town}}</dd>

                        <dt>Postcode</dt>
                        <dd>{{$order->sap->property->postcode}}</dd>
                    </dl>
                </div>
                <div class="col-sm-4 pure-u-1-3">
                    <dl>
                        <dt>Email</dt>
                        <dd>{{$order->sap->property->email}}</dd>

                        <dt>Home Number</dt>
                        <dd>{{$order->sap->property->landline_phone}}</dd>

                        <dt>Mobile Number</dt>
                        <dd>{{$order->sap->property->mobile_phone}}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Confirmation
        </div>

        <div class="card-block">
            <div class="row pure-g">
                <div class="col-md-6 pure-u-1-2">
                    <p>To accept the quotation please sign and return this form to Solartherm UK.</p>

                    <p>I agree to the quotation and confirm the order for the products and installation services
                        specified. I agree to the total cost and payment terms. I have read and agree to abide by
                        Solartherm UK Terms &amp; Conditions (Part 3) provided with the quotation/contract.</p>

                    <p>I understand any deposit paid is protected by the HIES insurance policy. A full copy of the
                        insurance policy can be obtained from the www.hies.org website.</p>
                </div>

                <div class="col-md-6 pure-u-1-2">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                Total Order Price<br>
                                (inc VAT)
                            </td>
                            <td>£{{number_format($order->sap->system->system_cost, 2)}}</td>
                        </tr>
                        <tr>
                            <td>
                                Deposit<br>
                                (inc VAT)
                            </td>
                            <td>£{{number_format($order->deposit)}}</td>
                        </tr>
                        <tr>
                            <td>Method of Payment</td>
                            <td>{{Config::get('crm.payment_methods.'.$order->payment_method)}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Silvercrest Energy Limited trading as Solartherm, authorised and regulated by the Financial
                        Conduct Authority. We are a Credit Broker and not a Lender. We offer credit facilities from a
                        panel of lenders.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_styles')
    <style>
        body {
            background: inherit
        }

        .card {
            page-break-inside: avoid !important;
        }
    </style>
@endsection