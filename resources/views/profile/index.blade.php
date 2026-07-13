@extends('layouts.app')

@php

$user = $user ?? (object)[

    'name'=>'Admin SupplyChain AI',

    'email'=>'admin@supplychain.ai',

    'role'=>'Administrator',

    'created_at'=>now()

];

@endphp

@section('content')


<div class="container-fluid">


<h1 class="fw-bold mb-4">

<i class="bi bi-person-circle"></i>

Profile

</h1>





@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif





<div class="row g-4">



<!-- PROFILE CARD -->

<div class="col-md-4">


<div class="card card-custom p-4 text-center">


<div class="avatar">

<i class="bi bi-person"></i>

</div>


<h3 class="mt-3">

{{ $user->name ?? 'Administrator' }}

</h3>


<p class="text-muted">

{{ $user->email ?? 'admin@supplychain.ai' }}

</p>



<span class="badge bg-primary">

AI Supply Chain Analyst

</span>



<hr>



<div class="text-start">


<p>

🌎 Platform:

<br>

<b>
SupplyChain AI
</b>

</p>



<p>

🔐 Account:

<br>

<b>
Active
</b>

</p>



<p>

📅 Joined:

<br>

<b>

{{ 
    $user && $user->created_at 
    ? $user->created_at->format('d M Y') 
    : '13 Jul 2026'
}}

</b>

</p>


</div>



</div>


</div>






<!-- EDIT PROFILE -->

<div class="col-md-8">


<div class="card card-custom p-4">


<h4>

Edit Profile

</h4>



<form method="POST"
action="{{route('profile.update')}}">

@csrf



<div class="mb-3">

<label>
Name
</label>


<input
class="form-control"
name="name"
value="{{ $user->name ?? 'Admin SupplyChain AI' }}">

</div>



<div class="mb-3">


<label>
Email
</label>


<input
class="form-control"
name="email"
value="{{ $user->email ?? 'admin@supplychain.ai' }}">


</div>



<button class="btn btn-primary">

Save Profile

</button>


</form>



</div>








<div class="card card-custom p-4 mt-4">


<h4>

Change Password

</h4>


<form method="POST"
action="{{route('profile.password')}}">

@csrf



<input
class="form-control mb-3"
type="password"
name="current_password"
placeholder="Current Password">



<input
class="form-control mb-3"
type="password"
name="password"
placeholder="New Password">



<input
class="form-control mb-3"
type="password"
name="password_confirmation"
placeholder="Confirm Password">



<button class="btn btn-dark">

Update Password

</button>



</form>


</div>


</div>


</div>


</div>



@endsection



<style>


.avatar{


width:100px;

height:100px;

margin:auto;


border-radius:50%;


background:

linear-gradient(
135deg,
#0284c7,
#2563eb
);


display:flex;


align-items:center;

justify-content:center;


font-size:50px;


color:white;


}



</style>