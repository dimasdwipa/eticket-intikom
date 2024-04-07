
@if( Auth::user()->CurrentTeam->code=='SA')
  @include('layouts.sliderSA')
@else
  
  @include('layouts.sliderNormal')
@endif