<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
SupplyChain AI - Login
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>


body{

min-height:100vh;

display:flex;

align-items:center;

justify-content:center;

font-family:
'Inter',
Arial,
sans-serif;


background:

linear-gradient(
135deg,
#0284c7,
#22d3ee
);


}



.login-box{


width:430px;


background:white;


border-radius:30px;


padding:45px;


box-shadow:

0 25px 60px rgba(0,0,0,.2);


}



.logo{


text-align:center;

font-size:35px;

font-weight:900;

margin-bottom:10px;


}



.logo span{

color:#0284c7;

}



.subtitle{


text-align:center;

color:#64748b;

margin-bottom:35px;


}



.form-control{


height:50px;

border-radius:15px;


}



.btn-login{


width:100%;


height:50px;


border-radius:50px;


border:none;


background:

linear-gradient(
90deg,
#0284c7,
#22d3ee
);


color:white;


font-weight:700;


font-size:16px;


}



.btn-login:hover{


opacity:.9;


}



.alert{


border-radius:15px;


}



.register{


text-align:center;

margin-top:25px;

color:#64748b;


}



.register a{


color:#0284c7;

font-weight:700;

text-decoration:none;


}



</style>


</head>


<body>


<div class="login-box">



<div class="logo">

🌐 SupplyChain

<span>
AI
</span>

</div>



<div class="subtitle">

Global Supply Chain Intelligence Platform

</div>




@if(session('error'))

<div class="alert alert-danger">

{{session('error')}}

</div>

@endif



@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif





<form method="POST" action="{{route('login.process')}}">


@csrf



<div class="mb-3">


<label class="mb-2">

Email

</label>


<input

type="email"

name="email"

class="form-control"

placeholder="admin@supplychain.ai"

required

>


</div>





<div class="mb-4">


<label class="mb-2">

Password

</label>


<input

type="password"

name="password"

class="form-control"

placeholder="********"

required

>


</div>





<button class="btn-login">

Login

</button>




</form>






<div class="register">


Belum punya akun?


<a href="{{route('register')}}">

Register

</a>


</div>



</div>


</body>


</html>