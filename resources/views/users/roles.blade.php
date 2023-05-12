@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add role
                </div>
                <div class="card-block">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: 0px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('users/roles') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="action" value="new_role">
                        <div class="form-group">
                            <label for="roleName">Name</label>
                            <input type="text" class="form-control" name="name" id="roleName">
                        </div>
                        <div class="form-group">
                            <label for="roleDisplayName">Display name</label>
                            <input type="text" class="form-control" name="display_name" id="roleDisplayName">
                        </div>
                        <div class="form-group">
                            <label for="roleDescription">Description</label>
                            <input type="text" class="form-control" name="description" id="roleDescription">
                        </div>
                        <input type="submit" value="Add role" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Existing roles
                </div>
                <div class="card-block">
                    <form action="{{ url('users/roles') }}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="action" value="update_roles">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Permissions</th>
                            </tr>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->display_name}}</td>
                                    <td>
                                        @foreach($permissions as $permission)
                                            <div class="checkbox">
                                                <label for="{{$role->id.'_'.$permission->name}}">
                                                    <input type="checkbox" id="{{$role->id.'_'.$permission->name}}"
                                                           name="permissions[{{$role->id}}][]"
                                                           value="{{$permission->id}}"
                                                           {{$role->hasPermission($permission->name)? 'checked':'' }}
                                                    >
                                                    {{$permission->display_name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <input type="submit" value="Save changes" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection