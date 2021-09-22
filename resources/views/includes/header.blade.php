<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <!-- Ticket 2c: Class toegevoegd aan link  -->
        <div class="button-manual">
            <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">
                <h1>{{ __('misc.homepage_title') }}</h1>
            </a>
        </div>
        
        @yield('introduction_text')
    </div>
</div>
