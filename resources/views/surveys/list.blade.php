@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('components.customer_search')
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    Survey
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
                        @foreach($surveys as $survey)
                            <tr>
                                <td>{{$survey->sap->property->first_name}}</td>
                                <td>{{$survey->sap->property->postcode}}</td>
                                <td>{{$survey->source->site}}</td>
                                <td>{{$survey->status}}</td>
                                <td>{{$survey->appointment_at}}</td>
                                <td>
                                    <a href="{{ url('/surveys/'.$survey->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{ $surveys->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection