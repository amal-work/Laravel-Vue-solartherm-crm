@extends('layouts.lead')

@section('lead_content')
    <div class="activity-feed">
        <?php
        $readable_tags = [
            'assessment' => "Initial assessment",
            'booking' => "Lead booked",
            'invalid_number' => "Invalid number",
            'wrong_details' => "Wrong details",
            'previously_contacted' => "Previously contacted",
            'out_of_area' => "Out of area",
            'not_interested' => "Not interested",
            'unsuitable' => "Unsuitable",
            'foreigner' => "Foreigner",
            'unable_to_contact' => "Unable to contact",
            'callback' => "Call back",
        ]
        ?>
        @if($lead->timeline)
            <h6>No events on the timeline</h6>
        @endif
        @foreach($lead->timeline as $item)
            <div class="feed-item">
                <div class="date">{{ $item->created_at }}</div>
                <div class="text">
                    <div class="alert alert-info" role="alert">
                        <strong>{{ $readable_tags[$item->type] }}</strong>
                        {!! '<br />'.$item->note !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
