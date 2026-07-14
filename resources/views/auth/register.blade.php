<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
SupplyChain AI - Register
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<style>


body{

min-height:100vh;

display:flex;

align-items:center;

justify-content:center;

font-family:Arial,sans-serif;

background:

linear-gradient(
135deg,
#0284c7,
#22d3ee
);

}



.register-box{


width:450px;


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

margin-bottom:30px;

}



.form-control{

height:50px;

border-radius:15px;

}



.btn-register{


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


}



.login-link{

text-align:center;

margin-top:25px;

color:#64748b;

}



.login-link a{

color:#0284c7;

font-weight:bold;

text-decoration:none;

}


</style>


</head>


<body>


<div class="register-box">


<div class="logo">

🌐 SupplyChain

<span>

AI

</span>

</div>


<div class="subtitle">

Create your SupplyChain AI account

</div>



@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>

{{$error}}

</li>

@endforeach

</ul>

</div>

@endif





<form method="POST" action="{{route('register.store')}}">


@csrf


<div class="mb-3">


<label>

Name

</label>


<input

type="text"

name="name"

class="form-control"

placeholder="Your name"

required>


</div>




<div class="mb-3">


<label>

Email

</label>


<input

type="email"

name="email"

class="form-control"

placeholder="email@example.com"

required>


</div>




<div class="mb-3">


<label>

Password

</label>


<input

type="password"

name="password"

class="form-control"

required>


</div>



<div class="mb-4">


<label>

Confirm Password

</label>


<input

type="password"

name="password_confirmation"

class="form-control"

required>


</div>



<button class="btn-register">

Create Account

</button>


</form>



<div class="login-link">


Sudah punya akun?


<a href="{{route('login')}}">

Login

</a>


</div>



</div>


</body>


</html>