@extends('layouts.app')


@section('content')


<div class="container">


<h2 class="fw-bold mb-4">

Edit User

</h2>



<div class="card p-4">


<form method="POST"
action="{{ route('admin.users.update',$user) }}">

@csrf

@method('PUT')



<input class="form-control mb-3"
name="name"
value="{{$user->name}}">



<input class="form-control mb-3"
name="email"
value="{{$user->email}}">



<input class="form-control mb-3"
type="password"
name="password"
placeholder="Kosongkan jika tidak ubah">



<select name="role"
class="form-select mb-3">


<option value="user"
{{$user->role=='user'?'selected':''}}>

User

</option>


<option value="admin"
{{$user->role=='admin'?'selected':''}}>

Admin

</option>


</select>



<button class="btn btn-primary">

Update

</button>


</form>


</div>


</div>


@endsection