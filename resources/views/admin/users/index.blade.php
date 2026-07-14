@extends('layouts.app')


@section('content')


<div class="container-fluid">


<div class="d-flex justify-content-between mb-4">


<div>

<h1 class="fw-bold">

👥 User Management

</h1>


<p class="text-muted">

Kelola pengguna SupplyChain AI

</p>


</div>


<a href="{{route('users.create')}}"
class="btn btn-primary">

+ Add User

</a>


</div>





@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif






<div class="card shadow-sm border-0 p-4">


<table class="table table-hover">


<thead>

<tr>

<th>
Name
</th>

<th>
Email
</th>

<th>
Role
</th>

<th>
Action
</th>


</tr>

</thead>


<tbody>


@foreach($users as $user)


<tr>


<td>

{{$user->name}}

</td>


<td>

{{$user->email}}

</td>


<td>


@if($user->role=='admin')

<span class="badge bg-danger">

Admin

</span>

@else

<span class="badge bg-primary">

User

</span>

@endif


</td>


<td>


<a href="{{route('users.edit',$user)}}"
class="btn btn-warning btn-sm">

Edit

</a>




<form action="{{route('users.destroy',$user)}}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')


<button class="btn btn-danger btn-sm"
onclick="return confirm('Hapus user?')">

Delete

</button>


</form>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>


@endsection