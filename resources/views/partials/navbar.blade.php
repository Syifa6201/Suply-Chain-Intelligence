<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>
    @if(Request::is('news'))
        News Intelligence
    @elseif(Request::is('weather'))
        Weather Analytics
    @elseif(Request::is('economy'))
        Economic Analytics
    @elseif(Request::is('currency'))
        Currency Analytics
    @elseif(Request::is('risk'))
        AI Risk Engine
    @else
        Global Dashboard
    @endif
    </h2>

    <div class="d-flex align-items-center gap-3">
        <span class="badge bg-danger">3 Alerts</span>
        <img src="https://ui-avatars.com/api/?name=Admin" width="45" class="rounded-circle">
    </div>
</div>