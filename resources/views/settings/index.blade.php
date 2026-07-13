@extends('layouts.app')


@section('content')


<div class="container-fluid">



<div class="card-custom p-5">


<h1 class="mb-3">

⚙ Settings

</h1>


<p class="text-muted">

Customize your SupplyChain AI experience

</p>





@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif





<hr>





<h3>

🌐 Language Preference

</h3>


<p class="text-muted">

Choose application language

</p>





<form method="POST"

action="{{route('settings.update')}}">

@csrf



<div class="row">


<div class="col-md-6">



<select 
name="language"
class="form-select">


<option value="en"
@if($language=='en')
selected
@endif
>

🇬🇧 English

</option>



<option value="id"
@if($language=='id')
selected
@endif
>

🇮🇩 Bahasa Indonesia

</option>


</select>

</div>



<div class="col-md-3">


<button

class="btn btn-primary btn-lg w-100">


Save Language


</button>


</div>



</div>


</form>





</div>




</div>



@endsection