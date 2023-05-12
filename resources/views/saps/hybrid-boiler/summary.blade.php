<?php $solar_calculations = new SolarCashFlowHelper($sap->system->toArray()) ?>
@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])

    <form class="summary" role="form" data-toggle="validator">
    <div class="card annual-breakdown">
        <div class="card-header">
            Estimated Payments for Daikin Altherma 5kW (EVLQ05CAV3 + EHYBM05AAV32)SPF:3.23
        </div>

        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th></th>
                            <th>Result(Energy Demand)</th>
                            <th>1st Year</th>
                            <th>Over 7 years</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Estimated running hours(per year) for your Daikin Altherma 5kW (EVLQ05CAV3 + EHYBM05AAV32)SPF:3.23)</td>
                                <td>0.33KWh</td>
                                <td>$9.08</td>
                                <td>$0.31</td>
                            </tr>
                            <tr>
                                <td>Efficiency(%95) AWHP</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>SPF (Seasonal Performance)</td>
                                <td>3.23</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Your current electric energy cost(E)</td>
                                <td>$0.100</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Your current standing charge ($)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Projected Running Cost</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th></th>
                            <th>Result</th>
                            <th>1st Year</th>
                            <th>Over 7 years</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>New gas boiler (85%) effiency</td>
                                <td>85%</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Estimated Gas Saving by Fitting the Hybrid Boiler</td>
                                <td>$1000.01</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Standing Charge ($)</td>
                                <td>0.044$</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Projected running cost of a new gas boiler</td>
                                <td></td>
                                <td>$0.100</td>
                                <td>$22.25</td>
                            </tr>
                            <tr>
                                <td>Current running cost of existing boiler</td>
                                <td></td>
                                <td>$0.100</td>
                                <td>$22.25</td>
                            </tr>
                            <tr>
                                <td>New heat pump running cost</td>
                                <td></td>
                                <td>$0.100</td>
                                <td>$22.25</td>
                            </tr>
                            <tr>
                                <td>Running cost saving per year</td>
                                <td></td>
                                <td>$0.100</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Total saving against Gas over 20 years (basedon current gas / electric prices)</td>
                                <td></td>
                                <td>$0.100</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Guaranteed RHI payment 1st Year</td>
                                <td></td>
                                <td>$0.100</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Guaranteed Total RHI repayment to customer over 7 years</td>
                                <td></td>
                                <td>$0.100</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Add the RHI payment & Gas savings to get 7 year Total Saving over Gas</td>
                                <td></td>
                                <td>$0.100</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Projected saving over 20 years against fitting a Gas boiler including the year RHI payments</td>
                                <td></td>
                                <td>$0.100</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-md-6">
                    Signed by Assessor: Date:
                </div>

                <div class="col-md-6">
                    Signed by Customer: Date:
                </div>
            </div>
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