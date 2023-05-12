@extends('layouts.main')

@section('content')
    <form action="" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        System settings
                    </div>
                    <div class="card-block">

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <input type="submit" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
@endsection