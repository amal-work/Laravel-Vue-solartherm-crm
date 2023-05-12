@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('components.customer_search')
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    SAPs
                </div>
                <div class="card-block">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Postcode</th>
                            <th>Status</th>
                            <th>Appointment date</th>
                            <th>Completed date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($saps as $sap)                        
                            <tr>
                                <td>{{$sap->property ? $sap->property->first_name : $sap->lead->name}}</td>
                                <td>{{$sap->property ? $sap->property->postcode : $sap->lead->postcode}}</td>
                                <td>{{$sap->status}}</td>
                                <td>{{$sap->appointment_at}}</td>
                                <td>{{$sap->completed_at}}</td>
                                <td>
                                    <a href="{{ url('/saps/'.$sap->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{ $saps->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="allocationModal" tabindex="-1" role="dialog" aria-labelledby="allocationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lead assigned to</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="lead_id">
                    <select id="allocation-users" class="form-control" size="10" multiple="">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="allocation_save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script>
        $(document).ready(function() {
            var lead_id = 0;
            $('.allocation_edit').click(function () {
                $('#allocationModal').modal('show');
                lead_id = $(this).data('lead-id');
                $("#allocation-users").find("option:selected").removeAttr("selected");
                $.each($(this).data('allocations'), function (index, value) {
                    $('#allocation-users').find('option[value='+value+']').attr('selected','selected')
                })
            });

            $('#allocation_save').click(function () {
                $.ajax({
                    method: 'POST',
                    url: "/leads/"+lead_id+"/allocations",
                    data: {"users": $('#allocation-users').val()},
                    xhrFields: { withCredentials:true }

                }).done(function () {
                    $('#allocationModal').modal('hide');
                    location.reload();
                });
            });
        });
    </script>
@endsection