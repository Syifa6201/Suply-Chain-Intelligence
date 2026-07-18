@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="fw-bold mb-4">

Edit Article

</h2>

<div class="card shadow-sm p-4">

<form
method="POST"
action="{{ route('admin.articles.update',$article) }}"
enctype="multipart/form-data">

@csrf

@method('PUT')

<div class="mb-3">

<label>Title</label>

<input
type="text"
name="title"
value="{{$article->title}}"
class="form-control">

</div>

<div class="mb-3">

<label>Category</label>

<select
name="category"
class="form-select">

@foreach([
'Trade',
'Economy',
'Logistics',
'Weather',
'Risk'
] as $category)

<option
value="{{$category}}"
{{$article->category==$category?'selected':''}}>

{{$category}}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Content</label>

<textarea
name="content"
rows="10"
class="form-control">{{$article->content}}</textarea>

</div>

<div class="mb-3">

<label>Replace Image</label>

<input
type="file"
name="image"
class="form-control">

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option
value="Draft"
{{$article->status=='Draft'?'selected':''}}>

Draft

</option>

<option
value="Published"
{{$article->status=='Published'?'selected':''}}>

Published

</option>

</select>

</div>

<button class="btn btn-success">

Update Article

</button>

</form>

</div>

</div>

@endsection