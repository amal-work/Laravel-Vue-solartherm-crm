@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('components.customer_search')
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    Orders
                </div>
                <div class="card-block">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Postcode</th>
                            <th>Status</th>
                            <th>Date added</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->sap->property->first_name}}</td>
                                <td>{{$order->sap->property->postcode}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <a href="{{ url('/orders/'.$order->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{ $orders->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection
