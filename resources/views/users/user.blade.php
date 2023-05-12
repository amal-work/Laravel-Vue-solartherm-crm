@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User information</div>
                <div class="card-block text-center">
                    <h4>{{$user->name}}</h4>
                    {{$user->email}}
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab"
                               aria-controls="info" aria-expanded="true">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logs-tab" data-toggle="tab" href="#logs" role="tab"
                               aria-controls="profile">Logs</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <form action="{{url('users/'.$user->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- First Name -->
                                        <div class="form-group">
                                            {{ Form::label('first_name', 'First Name') }}
                                            {{ Form::text('first_name', $user->first_name, array(
                                                'id'                => 'first_name',
                                                'class'             => 'form-control',
                                                'required'          => '',
                                                'maxlength'         => '255',
                                                'value'             => $user->first_name
                                            )) }}
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Last Name -->
                                        <div class="form-group">
                                            {{ Form::label('last_name', 'Last Name') }}
                                            {{ Form::text('last_name', $user->last_name, array(
                                                'id'                => 'last_name',
                                                'class'             => 'form-control',
                                                'required'          => '',
                                                'maxlength'         => '255'
                                            )) }}
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Email -->
                                        <div class="form-group">
                                            {{ Form::label('email', 'Email') }}
                                            {{ Form::text('email', $user->email, array(
                                                'id'                => 'email',
                                                'class'             => 'form-control',
                                                'required'          => '',
                                                'maxlength'         => '255'
                                            )) }}
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Team -->
                                        <div class="form-group">
                                            {{ Form::label('team_id', 'Team') }}
                                            {{ Form::select('team_id', $teams, $user->team? $user->team->id:null, array(
                                                'id'                => 'team_id',
                                                'class'             => 'form-control',
                                            )) }}
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Password -->
                                        <div class="form-group">
                                            {{ Form::label('password', 'Password') }}
                                            {{ Form::password('password', array(
                                                'id'                => 'password',
                                                'class'             => 'form-control',
                                                'maxlength'         => '255',
                                                'placeholder'       => 'Enter to change password',
                                            )) }}
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-block btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
