@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            New lead
        </div>
        <div class="card-block">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="lead_form" method="post" action="{{url('leads/add')}}">
                {{ csrf_field() }}
                <input type="hidden" name="source" value="1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter full name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Postcode</label>
                            <input type="text" class="form-control" name="postcode" placeholder="Enter postcode">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::Label('source', 'Sources:') !!}
                            <select class="form-control" name="source">
                                @foreach($sources as $source)
                                <option value="{{$source->id}}">{{$source->name}} ({{$source->site}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
        </div>
        <button class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
    </div>
@endsection
