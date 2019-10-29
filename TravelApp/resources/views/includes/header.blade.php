
<div class="container blue">
    <div class="row">
        <div class="col-sm-4">
            <img src="{{URL('/images/bsu_logo.jpg')}}" alt="bsu logo">
        </div>


    </div>

    @if (Route::has('login'))
        <div class="row top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>
