@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('components.customer_search')
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    Installations
                </div>
                <div class="card-block">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Postcode</th>
                            <th>Status</th>
                            <th>Appointment date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($installations as $installation)
                            <tr>
                                <td>{{$installation->sap->property->first_name}}</td>
                                <td>{{$installation->sap->property->postcode}}</td>
                                <td>{{$installation->source->site}}</td>
                                <td>{{$installation->status}}</td>
                                <td>{{$installation->appointment_at}}</td>
                                <td>
                                    <a href="{{ url('/surveys/'.$installation->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{ $installations->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection