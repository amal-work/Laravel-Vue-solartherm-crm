@extends('layouts.main')

@section('content')

    <form role="form" data-toggle="validator">
        <div class="card payment-details">
            <div class="card-header">
                Book survey
            </div>

            <div class="card-block">
                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('survey_date', 'Survey date') }}
                        {{ Form::text('survey_date', null, array(
                            'id'                => 'survey_date',
                            'class'             => 'form-control',
                            'required'          => ''
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('exposure', 'Exposure') }}
                        {{ Form::text('exposure', null, array(
                            'id'                => 'exposure',
                            'class'             => 'form-control',
                            'required'          => ''
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('tile_type', 'Tile Type') }}
                        {{ Form::text('tile_type', null, array(
                            'id'                => 'tile_type',
                            'class'             => 'form-control',
                            'required'          => ''
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('inspected', 'Inspected') }}
                        {{ Form::text('inspected', null, array(
                            'id'                => 'inspected',
                            'class'             => 'form-control',
                            'required'          => ''
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('lining', 'Lining') }}
                        {{ Form::text('lining', null, array(
                            'id'                => 'lining',
                            'class'             => 'form-control',
                            'required'          => ''
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('notes', 'Notes') }}
                        {{ Form::textarea('notes', null, array(
                            'id'                => 'additional_equipment',
                            'rows'              => '5',
                            'class'             => 'form-control',
                            'required'          => ''
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('surveyor', 'Surveyor') }}
                        {{ Form::select('surveyor', Role::with('users')->where('name', 'surveyor')->get(),
                               array(
                                   'id'      => 'county',
                                   'class'   => 'form-control',
                                   'v-model' => 'county'
                                   )
                        )) }}
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('custom_styles')

@endsection
@section('custom_script')

@endsection