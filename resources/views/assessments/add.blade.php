@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">New Questionnaire</div>
        <div class="card-block">
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
    </div>

@endsection
