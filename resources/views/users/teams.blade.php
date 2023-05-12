@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add team
                </div>
                <div class="card-block">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('users/teams') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="action" value="new_team">
                        <div class="form-group">
                            <label for="newTeamName">Name</label>
                            <input type="text" class="form-control" name="name" id="newTeamName">
                        </div>
                        <input type="submit" value="Add team" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Existing teams
                </div>
                <div class="card-block">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Users</th>
                            <th>Action</th>
                        </tr>
                        @foreach($teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->users->count()}}</td>
                                <td>
                                    <button class="btn btn-warning" onclick="renameTeam('{{$team->id}}', '{{$team->name}}')">Rename</button>
                                    <button class="btn btn-danger" onclick="deleteTeam('{{$team->id}}', '{{$team->name}}')">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script>
        function renameTeam(id, name) {
            $('input[name=id]').val(id);
            $('#renameTeamName').val(name);
            $('#renameTeam').modal('toggle');
        }
        function deleteTeam(id, name) {
            $('input[name=id]').val(id);
            $('#deleteTeamName').text(name);
            $('#deleteTeam').modal('toggle');
        }
    </script>
@endsection

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="renameTeam" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rename team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('users/teams')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="action" value="rename_team">
                    <input type="hidden" name="id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="renameTeamName">New name</label>
                            <input type="text" name="name" class="form-control" id="renameTeamName">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteTeam" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-body">
                       Are you sure about deleting team <b id="deleteTeamName"></b>
                    </div>
                    <div class="modal-footer">
                        <form action="{{url('users/teams')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="action" value="delete_team">
                            <input type="hidden" name="id" value="">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, delete</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection