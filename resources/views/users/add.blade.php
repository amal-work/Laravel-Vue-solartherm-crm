@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            New user
        </div>
        <div class="card-block">
            <form id="lead_form" method="post" action="{{url('users/add')}}">
                {{ csrf_field() }}
                <input type="hidden" name="source" value="manual">
                <div class="row">
                    <div class="col-sm-12">
                        {{ Form::bsSelect('team','Team', $teams) }}
                    </div>
                    <div class="col-sm-12">
                        {{ Form::bsText('name','Full name') }}
                    </div>
                    <div class="col-sm-12">
                        {{ Form::bsText('email','Email') }}
                    </div>
                    <div class="col-sm-12">
                        {{ Form::bsPassword('password','Password') }}
                    </div>
                    <div class="col-sm-12">
                        {{ Form::bsSelect('role', 'Role', $roles) }}
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
@endsection
