<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
SupplyChain AI
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css">



<style>


:root{

--cyan:#22d3ee;

--blue:#0284c7;

--dark:#020617;

}



*{

box-sizing:border-box;

}



body{

margin:0;

font-family:
'Inter',
'SF Pro Display',
Arial,
sans-serif;

background:

linear-gradient(
135deg,
#f8fafc 0%,
#eef7ff 45%,
#ffffff 100%
);


min-height:100vh;


color:#0f172a;


}



/* =====================
NAVBAR
===================== */

.top-nav{

height:78px;

display:flex;

align-items:center;

justify-content:space-between;

padding:0 45px;

background:white;

border-bottom:1px solid #e2e8f0;

box-shadow:
0 5px 20px rgba(15,23,42,.08);

position:sticky;

top:0;

z-index:999;

}


/* LOGO */

.logo{

display:flex;

align-items:center;

gap:8px;

font-size:28px;

font-weight:900;

color:#0f172a;

white-space:nowrap;

}


.logo span{

color:#06b6d4;

}



/* MENU */

.menu{

display:flex;

align-items:center;

gap:8px;

}



.menu a{


padding:

10px 14px;


border-radius:12px;


font-size:15px;


font-weight:600;


color:#475569;


text-decoration:none;


transition:.3s;


white-space:nowrap;


}



.menu a:hover{


background:#e0f2fe;


color:#0284c7;


}



/* USER */


.user-pill{


padding:

10px 20px;


border-radius:50px;


background:#eff6ff;


border:1px solid #bae6fd;


color:#0369a1;


font-weight:700;


white-space:nowrap;


}

/* =====================
CONTENT
===================== */


.main-content{


padding:

40px 60px;


}





/* =====================
CARD
===================== */


.card-custom{


background:white;



border:

1px solid #e2e8f0;



border-radius:25px;



box-shadow:


0 15px 35px rgba(15,23,42,.08);



color:#0f172a;



}



.card-custom:hover{


transform:

translateY(-6px);



box-shadow:


0 25px 45px rgba(14,165,233,.15);



}






/* =====================
DASHBOARD MENU
===================== */


.dashboard-menu{


display:flex;


align-items:center;


gap:15px;



padding:18px;



background:#f8fafc;



border:

1px solid #e2e8f0;



border-radius:18px;



color:#334155;



text-decoration:none;



transition:.3s;


}



.dashboard-menu i{


color:#0284c7;


font-size:24px;


}



.dashboard-menu:hover{


background:#e0f2fe;


color:#0284c7;



transform:translateX(8px);


}


/* =====================
HERO
===================== */

.hero{


background:

linear-gradient(
135deg,
#ffffff,
#e0f2fe
);


border-radius:35px;


padding:70px;


box-shadow:

0 20px 50px rgba(14,165,233,.12);


border:

1px solid #dbeafe;


}

.hero-section{


height:500px;


border-radius:35px;


padding:70px;


display:flex;


align-items:center;



background:


linear-gradient(

90deg,

rgba(2,6,23,.95),

rgba(2,6,23,.3)

),


url('/images/hero-ship.jpg');



background-size:cover;


background-position:center;


}




.hero-section h1{


font-size:60px;


font-weight:900;


}

.hero h1{


font-size:64px;


font-weight:900;


line-height:1.1;


color:#0f172a;


}



.hero h1 span{


color:#06b6d4;


}


.hero-section span{


color:#22d3ee;


}





.btn-main{


background:

linear-gradient(

90deg,

#0284c7,

#22d3ee

);



padding:

15px 35px;



border-radius:50px;



color:white;


text-decoration:none;


font-weight:700;


}






/* =====================
KPI
===================== */


.kpi-card{


background:white;



border-radius:25px;



padding:30px;



border:

1px solid #e2e8f0;



box-shadow:

0 15px 30px rgba(0,0,0,.06);


}



.kpi-card h2{


color:#0284c7;


font-size:42px;


font-weight:800;


}




#worldMap,
#tradeMap,
#vesselMap{


height:650px;


border-radius:25px;


}






@media(max-width:1000px){


.menu{

display:none;

}


.main-content{

padding:20px;

}


}

.logo-icon{

font-size:25px;

}

.main-content{

padding:35px 55px;


}


section,
.card-custom,
.hero{


animation:

fade .5s ease;


}



@keyframes fade{


from{

opacity:0;

transform:translateY(15px);

}


to{

opacity:1;

transform:none;

}


}

.form-select{

border-radius:15px;

padding:15px;

border:1px solid #cbd5e1;

}


.btn-primary{

background:

linear-gradient(
90deg,
#0284c7,
#22d3ee
);

border:none;

border-radius:50px;

font-weight:700;

}

#portMap{

height:600px;

width:100%;

border-radius:25px;

overflow:hidden;

z-index:1;

}

</style>


</head>



<body>



<nav class="top-nav">


<div class="logo">

<span class="logo-icon">
🌐
</span>

SupplyChain

<span>
AI
</span>

</div>


<div class="menu">


<a href="/dashboard">

{{ __('messages.dashboard') }}

</a>


<a href="/global">

{{ __('messages.global') }}

</a>


<a href="/countries">

{{ __('messages.countries') }}

</a>

<a href="/weather">

Weather

</a>

<a href="/economy">

{{ __('messages.economy') }}

</a>


<a href="/currency">

{{ __('messages.currency') }}

</a>


<a href="/news">

{{ __('messages.news') }}

</a>


<div class="user-pill">
    
<a href="/profile">

{{ __('messages.profile') }}

</a>
<form method="POST" action="{{route('logout')}}">

@csrf

<button 
class="btn btn-danger btn-sm"
>

Logout

</button>

</form>
</div>



</div>

</nav>



<div class="main-content">


@yield('content')


</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>


@stack('scripts')


</body>


</html>