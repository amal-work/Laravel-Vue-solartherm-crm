@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ul class="steps">
                <li class="completed">
                    <a href="{{url('leads/'.$lead->id)}}">
                        Lead
                        @if(Request::segment(3) == '')<i class="fa fa-dot-circle-o"></i>@endif
                    </a>
                </li>
                <li class="{{ sizeof($lead->assessments) ?'completed':''  }}">
                    <a href="{{url('leads/'.$lead->id.'/assessment')}}">
                        Assessment
                        @if(Request::segment(3) == 'assessment')<i class="fa fa-dot-circle-o"></i>@endif
                    </a>
                </li>
                <li class="{{ sizeof($lead->saps) ?'completed':''  }}">
                    <a href="{{url('leads/'.$lead->id.'/saps')}}">
                        SAP
                        @if(Request::segment(3) == 'saps')<i class="fa fa-dot-circle-o"></i>@endif
                    </a>
                </li>
                <li class="{{ sizeof($lead->orders) ?'completed':''  }}">
                    <a href="{{url('leads/'.$lead->id.'/orders')}}">
                        Order
                        @if(Request::segment(3) == 'orders')<i class="fa fa-dot-circle-o"></i>@endif
                    </a>
                </li>
                <li class="{{ sizeof($lead->surveys) ?'completed':''  }}">
                    <a href="">
                        Survey
                        @if(Request::segment(3) == 'surveys')<i class="fa fa-dot-circle-o"></i>@endif
                    </a>
                </li>
                <li class="{{ sizeof($lead->installations) ?'completed':'' }}">
                    <a href="">
                        Installation
                        @if(Request::segment(3) == 'isntallations')<i class="fa fa-dot-circle-o"></i>@endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card">
                <div class="card-header">
                    Lead information
                    @if($lead->findAttribute('crm_id'))
                        <a href="http://crm.solarthermuk.co.uk/leads/{{$lead->findAttribute('crm_id')}}"><span class="badge badge-success float-right">CRM</span></a>
                    @endif
                </div>
                <div class="card-block text-center">
                    <h3>{{$lead->name}}</h3>
                    <p>{{$lead->postcode}}</p>
                    <h6 class="hidden-xs-down">{{$lead->phone}}</h6>
                    <h6 class="hidden-xs-down">{{$lead->email}}</h6>
                    <h6 class="hidden-sm-up"><a href="tel:{{$lead->phone}}" class="btn btn-primary btn-block">Call customer</a></h6>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Actions
                </div>
                <div class="card-block">
                    <div id="options_main">
                        <button type="button" onclick="opt('reject')" class="btn btn-danger btn-block">Reject</button>
                        <button type="button" onclick="opt('dead')" class="btn btn-danger btn-block">Dead</button>
                        <button type="button" onclick="opt('call_again')" class="btn btn-warning btn-block">Call again</button>
                    </div>
                    <div id="options_assessment" style="display: none;">
                        <a class="btn btn-secondary btn-block" href="{{url('/leads/assessment?lead='.$lead->id)}}&product=solar-panels">Solar panels</a>
                        <a class="btn btn-secondary btn-block" href="{{url('/leads/assessment?lead='.$lead->id)}}&product=hybrid-boiler">Hybrid boiler</a>
                        {{--<a class="btn btn-secondary btn-block" href="{{url('/leads/assessment?lead='.$lead->id)}}&product=solar_edge">SolarEdge</a>--}}
                    </div>
                    <div id="options_reject" style="display: none;">
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('invalid_number')">Invalid number</button>
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('wrong_details')">Wrong details</button>
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('previously_contacted')">Previously contacted</button>
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('out_of_area')">Out of area</button>
                    </div>
                    <div id="options_dead" style="display: none;">
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('not_interested')">Not interested</button>
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('unsuitable')">Unsuitable</button>
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('foreigner')">Foreigner</button>
                    </div>
                    <div id="options_call_again" style="display: none;">
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('unable_to_contact')">Unable to contact</button>
                        <button type="button" class="btn btn-secondary btn-block" onclick="opt('callback')">Call back</button>
                    </div>
                    <div id="options_form" style="display: none;">
                        <form action="{{url('leads/'.$lead->id.'/mark')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="">
                            <div class="form-group row" style="display: none;" id="date_time">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="event_at" placeholder="Date / time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea name="note" class="form-control" rows="5" placeholder="Note"></textarea>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-block">
                    @yield('lead_content')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{ asset('bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <script>
        $('input[name=event_at]').datetimepicker({
            format: 'yyyy-mm-dd hh:ii'
        });

        var current_option = 'main';

        function opt(option) {
            $('#back_btn').css("visibility", "visible");

            if (['assessment', 'reject', 'dead', 'call_again'].indexOf(option) >= 0) {
                $('#options_main').slideToggle();
                $('#options_'+option).slideToggle();
            }else{
                $('#options_form').slideToggle();
                $('#options_'+current_option).slideToggle();
            }
            if(option == 'callback') $("#date_time").show();
            current_option = option;

            $('input[name=type]').val(current_option);
        }
    </script>
@endsection