<div class="admin-sidebar">

<div class="logo">

<h3>

<i class="bi bi-globe2"></i>

SupplyChain <span>AI</span>

</h3>

<p>Administrator Panel</p>

</div>

<a href="{{ route('admin.dashboard') }}">

<i class="bi bi-speedometer2"></i>

Dashboard

</a>

<a href="{{ route('admin.users.index') }}">

<i class="bi bi-people-fill"></i>

User Management

</a>

<a href="{{ route('ports.index') }}">

<i class="bi bi-anchor-fill"></i>

Port Dataset

</a>

<a href="{{ route('admin.articles.index') }}">

<i class="bi bi-newspaper"></i>

Article Analysis

</a>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="logout-btn">

<i class="bi bi-box-arrow-right"></i>

Logout

</button>

</form>

</div>

<style>

.admin-sidebar{

position:fixed;

left:0;

top:0;

width:260px;

height:100vh;

background:white;

box-shadow:0 10px 30px rgba(0,0,0,.08);

padding:30px;

z-index:999;

}

.logo{

margin-bottom:40px;

}

.logo h3{

font-weight:800;

}

.logo span{

color:#0ea5e9;

}

.admin-sidebar a{

display:block;

padding:15px 18px;

margin-bottom:10px;

border-radius:15px;

text-decoration:none;

font-weight:600;

color:#334155;

transition:.3s;

}

.admin-sidebar a:hover{

background:#2563eb;

color:white;

}

.logout-btn{

width:100%;

margin-top:30px;

border:none;

background:#ef4444;

color:white;

padding:15px;

border-radius:15px;

font-weight:700;

}

.admin-content{

margin-left:280px;

}

</style>