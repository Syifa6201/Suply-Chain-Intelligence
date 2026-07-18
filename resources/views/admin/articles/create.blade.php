@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="fw-bold mb-4">

Add Article

</h2>

<div class="card shadow-sm p-4">

<form
method="POST"
action="{{ route('admin.articles.store') }}"
enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label>Title</label>

<input
type="text"
name="title"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Category</label>

<select
name="category"
class="form-select">

<option>Trade</option>

<option>Economy</option>

<option>Logistics</option>

<option>Weather</option>

<option>Risk</option>

</select>

</div>

<div class="mb-3">

<label>Content</label>

<textarea
name="content"
rows="10"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label>Image</label>

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

<option value="Draft">

Draft

</option>

<option value="Published">

Published

</option>

</select>

</div>

<button class="btn btn-primary">

Save Article

</button>

</form>

</div>

</div>

@endsection