@if(session('notification'))
    <notification :session="{{ json_encode(session('notification')) }}" />
@endif
