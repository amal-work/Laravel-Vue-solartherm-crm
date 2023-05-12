<?php $solar_calculations = new SolarCashFlowHelper($sap->system->toArray()) ?>
@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])

    <form class="summary" role="form" data-toggle="validator">
        <div class="card benefit-overview">
            <div class="card-header">
                Overview of Projected Annual SAP Calculations for the Single String Inverter System
            </div>
            <div class="card-block">
                <p>The Government states all clients should be made aware that projected
                    numbers may vary from home to home as well as location.</p>
                <hr>
                <h5>Energy</h5>
                <p>
                    You are currently paying
                    <b>£{{number_format($sap->property->electricity_spend,2 )}}</b> per year &amp; using
                    <b>{{$sap->property->kw_usage}} kWh</b> per energy of electric per year.
                </p>
                <p>
                    If energy cost was to rise by just {{$solar_calculations->energy_inflation * 100}}%
                    per year,
                    over the next 20 years then you will spend a total of:
                    <b>£{{number_format($solar_calculations->annual_total_energy_cost(20, $sap->property->electricity_spend), 2)}}</b>
                    on energy cost over this period.
                </p>
                <p>
                    If energy cost was to rise
                    by {{$solar_calculations->energy_inflation * 100 * 2}}% per year,
                    over the next 20 years then you will spend a total of:
                    <b>£{{number_format($solar_calculations->annual_total_energy_cost(20, $sap->property->electricity_spend) * 2, 2)}}</b>
                    on Energy over this period.
                </p>
                <p>
                    Projected savings over the next 20 year period on your energy cost along with the
                    SolarTherm Optimised system installed is:
                    <b>£{{number_format($solar_calculations->annual_total_energy_cost(20, $sap->property->electricity_spend) * ($sap->system->solar_usage_percentage/100), 2)}}</b>
                </p>

                <h5>Feed in Tariff</h5>

                <p>Your energy supplier will pay you a set rate for each unit (or kWh) of electricity you generate.</p>

                <p>In your case this will amount to <b>£{{number_format($solar_calculations->annual_total_fit(20), 2)}}</b>, over the next 20 years.</p>

                <h5>Exported Energy</h5>

                <p>As well as the generation tariff, you can also sell any extra units you don’t use back to your electricity supplier. This is called an ‘export tariff’.</p>
                <p>You’ll get <b>{{$sap->system->electricity_export_rate}}p</b> per unit of electricity. You can sell back half of the units of electricity you generate.</p>
                <p>In your case this will amount to around <b>£{{number_format($solar_calculations->inflated_export(1), 2)}}</b>
                    per annum or <b>£{{number_format($solar_calculations->annual_total_export(20), 2)}}</b> over the next 20 years.</p>
            </div>
        </div>
    </form>
    @include('saps._bottom_bar')
@endsection

@section('modals')
    <div class="modal fade" id="toOrderModal" tabindex="-1" role="dialog" aria-labelledby="toOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order(s)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(sizeof($sap->orders))
                        @foreach($sap->orders as $order)
                            <ul class="list-group">
                                <a href="{{url('orders/'.$order->id)}}"><li class="list-group-item">{{$order->id}} - {{$order->created_at}}</li></a>
                            </ul>
                        @endforeach
                    @else
                        <p>Would you like to proceed to an order?</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{ Form::button('Create an order', array('class' => 'btn btn-success pull-right', 'v-on:click'=> 'createOrder')) }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script>
        var app = new Vue({
            el: '#app',
            methods: {
                formSubmit: function(){
                    $('#toOrderModal').modal('toggle');
                },
                createOrder: function(){
                    $.ajax({
                        method: 'POST',
                        url: "{{ url('/orders/add') }}",
                        data: {"sap_id": "{{$sap->id}}"},
                        xhrFields: { withCredentials:true }

                    }).done(function (order) {
                        window.location.replace("{{url('/orders')}}/"+order.id);
                    });
                }
            }
        });
    </script>
@endsection