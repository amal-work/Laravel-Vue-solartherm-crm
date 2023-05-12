@extends('layouts.lead')
@section('lead_content')
    @if($lead->saps)
        <table class="table">
            @foreach($assessments as $assessment)
                <tr>
                    <td>{{$assessment->id}}</td>
                    <td>{{$assessment->created_at}}</td>
                    <td>
                        <a class="btn btn-secondary"
                           href="{{ url('assessments/'.$assessment->product.'/'.$assessment->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{url('assessments/add?product=solar-pv&lead_id='.$lead->id)}}" class="btn btn-primary btn-block">Solar
                    PV</a>
            </div>
        </div>
    @endif
@endsection