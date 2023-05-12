@extends('layouts.lead')

@section('lead_content')
    <div id="new_booking" style="@if($lead->booking) display: none; @endif">
        <form method="post" action="{{url('leads/'.$lead->id.'/booking')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Booking date</label>
                        <input type="text" name="provisional_date" id="provisional_date" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
    @if($lead->booking)
        <button class="btn btn-block btn-primary" onclick="$('#new_booking').show();$(this).hide();">Reappoint</button>
        <table class="table">
            @foreach($lead->marks->where('type', 'booking') as $item)
                <tr>
                    <td>{{$item->event_at}}</td>
                    <td>{{$item->note}}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection

@section('custom_styles')
    <link rel="stylesheet" href="{{asset('bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">

@endsection
@section('custom_script')
    <script src="{{ asset('bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('input[name=provisional_date]').datetimepicker({
                format: 'dd-mm-yyyy hh:ii'
            });
        });
        </script>

@endsection