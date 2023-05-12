@extends('layouts.main')

@section('content')

    <form role="form">
        <div class="card payment-details">
            <div class="card-header">
                Survey
            </div>

            <div class="card-block">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>Survey date</td>
                            <td>{{$survey->appointment_at}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{$survey->status}}</td>
                        </tr>
                        <tr>
                            <td>Completed at</td>
                            <td>{{$survey->completed_at}}</td>
                        </tr>
                        <tr>
                            <td>Attachments</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Notes</td>
                            <td>{{$survey->notes}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('custom_styles')

@endsection
@section('custom_script')

@endsection