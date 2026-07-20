<div class="sidebar-wrapper">


<div class="sidebar-brand">


<h3>
<i class="bi bi-globe2"></i>

SupplyChain <span>AI</span>

</h3>


<p>
Global Trade Intelligence Platform
</p>


</div>





<!-- MAIN -->

<div class="sidebar-section">

<div class="sidebar-title">
MAIN
</div>



<a href="/global"
class="{{ request()->is('global') ? 'active-menu':'' }}">

<i class="bi bi-globe-americas"></i>

Global Monitor

</a>



@if(session('user_role') == 'admin')

<a href="{{ route('admin.dashboard') }}"
class="{{ request()->routeIs('admin.dashboard') ? 'active-menu' : '' }}">

    <i class="bi bi-speedometer2"></i>

    Dashboard

</a>

@else

<a href="{{ route('dashboard') }}"
class="{{ request()->routeIs('dashboard') ? 'active-menu' : '' }}">

    <i class="bi bi-speedometer2"></i>

    Dashboard

</a>

@endif


</div>







<!-- INTELLIGENCE -->


<div class="sidebar-section">


<div class="sidebar-title">
INTELLIGENCE
</div>



<a href="/countries"
class="{{ request()->is('countries')?'active-menu':'' }}">


<i class="bi bi-flag"></i>

Countries

</a>




<a href="/weather"
class="{{ request()->is('weather')?'active-menu':'' }}">


<i class="bi bi-cloud-sun"></i>

Weather Intelligence

</a>





<a href="/economy"
class="{{ request()->is('economy')?'active-menu':'' }}">


<i class="bi bi-graph-up-arrow"></i>

Economic Monitor

</a>





<a href="/currency"
class="{{ request()->is('currency')?'active-menu':'' }}">


<i class="bi bi-currency-exchange"></i>

Currency Analysis

</a>





<a href="/news"
class="{{ request()->is('news')?'active-menu':'' }}">


<i class="bi bi-newspaper"></i>

News Intelligence

</a>





<a href="/risk"
class="{{ request()->is('risk')?'active-menu':'' }}">


<i class="bi bi-shield-exclamation"></i>

Country Risk

</a>






<a href="{{route('trade-risk.index')}}"
class="{{ request()->is('trade-risk')?'active-menu':'' }}">


<i class="bi bi-cpu"></i>

AI Trade Risk

</a>



</div>









<!-- MONITORING -->


<div class="sidebar-section">


<div class="sidebar-title">
MONITORING
</div>





<a href="{{route('ports.index')}}"
class="{{request()->is('ports')?'active-menu':''}}">


<i class="bi bi-geo-alt"></i>


Ports Intelligence

</a>






<a href="/live-vessels"
class="{{request()->is('live-vessels')?'active-menu':''}}">


<i class="bi bi-truck"></i>


Live Vessel Tracking


</a>






<a href="{{route('trade.index')}}"
class="{{request()->is('trade-intelligence')?'active-menu':''}}">


<i class="bi bi-box-seam"></i>


Trade Intelligence


</a>




</div>







<!-- AI ENGINE -->

<div class="sidebar-section">

<div class="sidebar-title">

AI ENGINE

</div>

<a href="#"
onclick="alert('Recommendation Engine Coming Soon')">

    <i class="bi bi-lightning-charge"></i>

    Recommendation Engine

</a>

<a href="{{ route('trade.prediction') }}"
class="{{ request()->routeIs('trade.prediction') ? 'active-menu' : '' }}">

    <i class="bi bi-stars"></i>

    Trade Prediction

</a>

<a href="{{ route('shipping.index') }}"
class="{{ request()->routeIs('shipping.*') ? 'active-menu' : '' }}">

    <i class="bi bi-box2"></i>

    Shipping Planner

</a>

<a href="{{ route('watchlist.index') }}"
class="{{ request()->routeIs('watchlist.*') ? 'active-menu' : '' }}">

    <i class="bi bi-star-fill"></i>

    Watchlist

</a>

</div>





<!-- SYSTEM -->


<div class="sidebar-section">


<div class="sidebar-title">

SYSTEM

</div>




<a href="{{route('profile.index')}}"
class="{{request()->is('profile')?'active-menu':''}}">

<i class="bi bi-person-circle"></i>

Profile

</a>




<a href="#">

<i class="bi bi-gear"></i>

Settings

</a>



</div>




</div>