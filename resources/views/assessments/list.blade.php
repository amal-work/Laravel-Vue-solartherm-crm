@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    Search
                </div>
                <form action="{{ url('/assessment') }}" method="get">
                    <div class="card-block">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{Request::get('name')}}" placeholder="Find Name..">
                        </div>
                        <div class="form-group">
                            <label>Postcode</label>
                            <input type="text" name="postcode" class="form-control" value="{{Request::get('postcode')}}" placeholder="Find Postcode..">
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone" class="form-control" value="{{Request::get('phone')}}" placeholder="Find Phone number..">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button>
                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    Assessments
                </div>
                <div class="card-block">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Postcode</th>
                            <th>Date added</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assessments as $assessment)
                            <tr>

                                <td>{{$assessment->lead->name}}</td>
                                <td>{{$assessment->lead->postcode}}</td>
                                <td>{{$assessment->created_at}}</td>
                                <td><a href="{{ url('/assessments/'.$assessment->product.'/'.$assessment->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{ $assessments->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection


@section('custom_script')
@endsection