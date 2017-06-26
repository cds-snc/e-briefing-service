@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message">
            <p class="notification is-{{ $msg }}">{{ Session::get($msg) }}</p>
        </div>
    @endif
@endforeach

@if(session()->has('errors'))
    <div class="flash-message">
        <div class="notification is-warning">
            <ul>
                @foreach(session('errors')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif