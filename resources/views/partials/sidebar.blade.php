<h3 class="text-center mb-4">
    <i class="bi bi-globe2"></i>
    SupplyChain AI
</h3>

<!-- MAIN -->
<p class="text-uppercase small text-secondary mt-3 mb-2">MAIN</p>

<a href="/global" class="{{ request()->is('global') ? 'active-menu' : '' }}">
    <i class="bi bi-globe-americas"></i>
    Global Monitor
</a>

<a href="/" class="{{ request()->is('/') ? 'active-menu' : '' }}">
    <i class="bi bi-speedometer2"></i>
    Dashboard
</a>

<hr class="text-secondary">

<!-- INTELLIGENCE -->
<p class="text-uppercase small text-secondary mb-2">INTELLIGENCE</p>

<a href="/countries" class="{{ request()->is('countries') ? 'active-menu' : '' }}">
    <i class="bi bi-flag"></i>
    Countries
</a>

<a href="/weather" class="{{ request()->is('weather') ? 'active-menu' : '' }}">
    <i class="bi bi-cloud-sun"></i>
    Weather
</a>

<a href="/economy" class="{{ request()->is('economy') ? 'active-menu' : '' }}">
    <i class="bi bi-graph-up"></i>
    Economy
</a>

<a href="/currency" class="{{ request()->is('currency') ? 'active-menu' : '' }}">
    <i class="bi bi-currency-exchange"></i>
    Currency
</a>

<a href="/news" class="{{ request()->is('news') ? 'active-menu' : '' }}">
    <i class="bi bi-newspaper"></i>
    News Intelligence
</a>

<a href="/risk" class="{{ request()->is('risk') ? 'active-menu' : '' }}">
    <i class="bi bi-shield-exclamation"></i>
    AI Risk Analysis
</a>

<hr class="text-secondary">

<!-- MONITORING -->
<p class="text-uppercase small text-secondary mb-2">MONITORING</p>

<a href="{{ route('ports.index') }}" 
   class="{{ request()->is('ports') ? 'active-menu' : '' }}">

    <i class="bi bi-geo-alt"></i>

    Ports

</a>

<a href="#" onclick="alert('Coming Soon')">
    <i class="bi bi-truck"></i>
    Live Vessels
</a>

<a href="#" onclick="alert('Coming Soon')">
    <i class="bi bi-box-seam"></i>
    Trade Intelligence
</a>

<a href="#" onclick="alert('Coming Soon')">
    <i class="bi bi-bookmark-star"></i>
    Watchlist
</a>

<hr class="text-secondary">

<!-- SYSTEM -->
<p class="text-uppercase small text-secondary mb-2">SYSTEM</p>

<a href="#" onclick="alert('Coming Soon')">
    <i class="bi bi-person-circle"></i>
    Profile
</a>

<a href="#" onclick="alert('Coming Soon')">
    <i class="bi bi-gear"></i>
    Settings
</a>