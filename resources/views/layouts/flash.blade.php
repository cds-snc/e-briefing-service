<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(session()->has($msg))
            <p class="notification is-{{ $msg }}">{{ Session::get($msg) }}</p>
        @endif
    @endforeach

    @if(session()->has('errors'))
        <div class="notification is-warning">
            <ul>
                @foreach(session('errors')->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>