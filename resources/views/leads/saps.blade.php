@extends('layouts.lead')

@section('lead_content')
    @if($lead->saps)
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <th>#</th>
                <th>Appointment Date/Time</th>
                <th>Notes</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($lead->saps as $sap)
                    <tr>
                        <td>{{$sap->id}}</td>
                        <td>{{$sap->appointment_at}}</td>
                        <td>{{$sap->notes}}</td>
                        <td>{{$sap->status}}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ url('saps/'.$sap->id.'/property') }}">View</a>
                            <a class="btn btn-danger" href="{{ url('saps/cancel/'.$sap->id) }}">Cancel</a>
                            <!-- <a class="btn btn-warning" href="{{ url('saps/'.$sap->id) }}">Edit</a> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#newSapModal">Book a new SAP</button>
@endsection

@section('custom_styles')
    <link rel="stylesheet" href="{{asset('bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('modals')
    <div class="modal fade" id="newSapModal" tabindex="-1" role="dialog" aria-labelledby="newSapModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSapModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{url('saps/add')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="lead_id" value="{{$lead->id}}">
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
                                    <label>Product</label>
                                    {{Form::select('product', array_filter(array_combine(array_keys(Config::get('crm.products')), array_column(Config::get('crm.products'), 'name'))), null, ['class'   => 'form-control'])}}
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{ asset('bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $('input[name=provisional_date]').datetimepicker({
                format: 'yyyy-mm-dd hh:ii:ss',
                useCurrent: true
            });
        });
    </script>

@endsection