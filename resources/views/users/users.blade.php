@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Users
                    <div class="pull-right">
                        <a href="{{url('users/roles')}}" class="btn btn-sm btn-warning">Roles</a>
                        <a href="{{url('users/add')}}" class="btn btn-sm btn-success">Add new</a>
                    </div>

                </div>
                <div class="card-block">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Team</th>
                            <th>Role</th>
                            <th>Assigned leads</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->team){{$user->team->name}}@endif</td>
                                <td>@if($user->roles){{$user->roles->implode('name', ', ')}}@endif</td>
                                <td>{{$user->leads()->count()}}</td>
                                <td><a href="{{ url('/users/'.$user->id) }}" class="btn btn-primary">View / Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection