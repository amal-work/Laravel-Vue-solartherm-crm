@extends('layouts.lead')

@section('lead_content')
    @if($lead->orders)
        <table class="table">
            @foreach($lead->orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->appointment_at}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ url('orders/'.$order->id.'/') }}">View</a>
                        <a class="btn btn-danger" href="{{ url('orders/'.$order->id.'/cancel') }}">Cancel</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection

@section('custom_styles')

@endsection
@section('custom_script')

@endsection