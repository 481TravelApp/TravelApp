
<div class="blue">

        @if (Route::has('login'))
            <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('oidlogin') }}">Login</a>
        @endauth
            </div>

    @endif
    </div>

