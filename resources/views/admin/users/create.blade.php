@extends('layouts.app')


@section('content')


<div class="container">


<h2 class="fw-bold mb-4">

Tambah User

</h2>



<div class="card p-4">


<form method="POST"
action="{{ route('admin.users.store') }}">

@csrf


<input class="form-control mb-3"
name="name"
placeholder="Name">



<input class="form-control mb-3"
name="email"
placeholder="Email">



<input class="form-control mb-3"
type="password"
name="password"
placeholder="Password">



<select name="role"
class="form-select mb-3">


<option value="user">

User

</option>


<option value="admin">

Admin

</option>


</select>



<button class="btn btn-primary">

Save

</button>


</form>


</div>


</div>


@endsection