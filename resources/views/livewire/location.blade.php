<div>
    <div class="col-md-6">
        <ul class="visible-md visible-lg text-right">
            {{-- <li><i class="fa fa-comment"></i> Live Chat</li> --}}
            @if(Session::has('city'))
                <li><a href="{{ route('home.change_location') }}"><i class="fa fa-map-marker"></i> {{ Session::get('city') }}, {{ Session::get('country') }}</a></li>
            @else
                <li><a href="{{ route('home.change_location') }}"><i class="fa fa-map-marker"></i> Ifite, Awka</a></li>
            @endif
        </ul>
    </div>
</div>
