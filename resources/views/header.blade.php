<div class="topbar pl-3">
    <a href="/"><div>
    <p class="title">Underground Events</p>
    <p class="subtitle">Local Area Event Directory</p>
    </div></a>

</div>
<div class="navigation">
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-dark navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="white-text navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="white-text nav-item nav-link" href="/today">Today's Events</a>
                <a class="white-text nav-item nav-link" href="/events">Upcoming Events</a>
                <a class="white-text nav-item nav-link" href="/addevent">Submit</a>
                <a class="white-text nav-item nav-link" href="/contact">Contact</a>
                @guest
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a class="white-text nav-item nav-link" href="/myevents">My Events</a>
                    <a class="white-text nav-item nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                   {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}

                @endguest
            </div>
        </div>

    </nav>
</div>
