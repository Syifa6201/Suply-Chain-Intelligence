<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Chain Intelligence</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.css">

    <style>

body{

    background:
    linear-gradient(
        135deg,
        #f1f5f9,
        #eef2ff
    );

    font-family:
    'Inter',
    Arial,
    sans-serif;

}


/* ==========================
 SIDEBAR
========================== */


.sidebar{

    width:270px;

    height:100vh;

    position:fixed;

    left:0;

    top:0;


    background:

    linear-gradient(
        180deg,
        #020617,
        #0f172a,
        #172554
    );


    color:white;

    padding:25px 18px;


    overflow-y:auto;


    box-shadow:

    8px 0 25px rgba(0,0,0,.15);


}



/* BRAND */

.sidebar h3{

    text-align:center;

    font-weight:800;

    font-size:26px;

    margin-bottom:35px;


}



.sidebar h3 i{

    color:#38bdf8;

}



.sidebar span{

    color:#38bdf8;

}





/* MENU */


.sidebar a{


    display:flex;

    align-items:center;

    gap:12px;


    color:#cbd5e1;


    text-decoration:none;


    padding:13px 15px;


    margin-bottom:8px;


    border-radius:14px;


    font-size:15px;


    transition:.3s;


}





.sidebar a i{

    font-size:19px;

    color:#38bdf8;

}




.sidebar a:hover{


    background:

    rgba(56,189,248,.15);


    color:white;


    transform:

    translateX(5px);


}




.sidebar a:hover i{


    color:white;


}




/* ACTIVE MENU */


.active-menu{


    background:

    linear-gradient(
        90deg,
        #0284c7,
        #2563eb
    )
    !important;


    color:white !important;


    font-weight:600;


    box-shadow:

    0 8px 20px rgba(37,99,235,.35);


}



.active-menu i{


    color:white !important;


}





/* MAIN CONTENT */


.main{


    margin-left:270px;


    padding:30px;


}




/* CARD */


.card-custom{


    border:none;


    border-radius:22px;


    box-shadow:

    0 10px 30px rgba(15,23,42,.08);


    transition:.3s;


}




.card-custom:hover{


    transform:

    translateY(-5px);


}





/* TABLE */


.table{


    border-radius:15px;


    overflow:hidden;


}



.table tbody tr{


    transition:.25s;


}



.table tbody tr:hover{


    background:#eff6ff;


}





.badge{


    padding:8px 14px;


    border-radius:999px;


}






/* MAP */


#worldMap,
#tradeMap{


    height:650px;


    border-radius:20px;


    overflow:hidden;


}




.news-title{


    display:-webkit-box;


    -webkit-line-clamp:2;


    -webkit-box-orient:vertical;


    overflow:hidden;


}

/* =========================
 CURRENCY PAGE
========================= */


.currency-header{

display:flex;

justify-content:space-between;

align-items:center;

margin-bottom:30px;

}



.currency-header h1{

font-size:42px;

font-weight:700;

color:#111827;

}



.currency-header p{

font-size:18px;

color:#64748b;

}



.alert-box{

background:#ef3340;

color:white;

padding:15px 30px;

border-radius:50px;

font-weight:600;

}




.country-search{

background:white;

border-radius:25px;

box-shadow:
0 10px 35px rgba(0,0,0,.08);

}



.country-search h4{

font-weight:700;

margin-bottom:20px;

}




.currency-result .currency-card{


height:210px;

display:flex;

flex-direction:column;

justify-content:center;

padding:30px;

border-radius:25px;

background:white;

box-shadow:

0 15px 35px rgba(0,0,0,.08);

transition:.3s;


}



.currency-result .currency-card:hover{


transform:translateY(-8px);


}



.currency-card h6{


color:#64748b;

font-size:15px;


}



.currency-card h2{


font-size:36px;

font-weight:700;

color:#111827;


}




@media(max-width:900px){


.currency-header{

flex-direction:column;

align-items:flex-start;

gap:20px;

}


}


</style>
</head>
<body>

<nav class="top-nav">

<div class="logo">

🌐 SupplyChain
<span>AI</span>

</div>


<div class="menu">

<a href="/">
Dashboard
</a>

<a href="/global">
Global Monitor
</a>

<a href="/live-vessels">
Vessels
</a>

<a href="/ports">
Ports
</a>

<a href="/risk">
AI Risk
</a>

<a href="/trade-intelligence">
Trade
</a>

</div>


<div class="user-pill">

Admin

</div>


</nav>



<div class="main-content">

@yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.js"></script>

@stack('scripts')

</body>
</html>>