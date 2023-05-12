<ul class="steps">
    <li class="{{ $sap_step >= 1?'completed':'' }}">
        <a href="{{$sap_step >= 0 ? url('/saps/'.$sap->id.'/property'): '#'}}">
            Property
            @if(Request::segment(3) == 'property')<i class="fa fa-dot-circle-o"></i>@endif
        </a>
    </li>
    <li class="{{ $sap_step >= 2?'completed':'' }}">
        <a href="{{$sap_step >= 1 ? url('/saps/'.$sap->id.'/system'): '#'}}">
            System
            @if(Request::segment(3) == 'system')<i class="fa fa-dot-circle-o"></i>@endif
        </a>
    </li>
    <li class="{{ $sap_step >= 3?'completed':'' }}">
        <a href="{{$sap_step >= 2 ? url('/saps/'.$sap->id.'/cash-flow'): '#'}}">
            Cash flow
            @if(Request::segment(3) == 'cash-flow')<i class="fa fa-dot-circle-o"></i>@endif
        </a>
    </li>
    <li class="{{ $sap_step >= 4?'completed':'' }}">
        <a href="{{$sap_step >= 3 ? url('/saps/'.$sap->id.'/summary'): '#'}}">
            Summary
            @if(Request::segment(3) == 'summary')<i class="fa fa-dot-circle-o"></i>@endif
        </a>
    </li>
</ul>