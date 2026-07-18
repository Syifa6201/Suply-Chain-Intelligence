@extends('layouts.app')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="fw-bold">

📰 Article Analysis

</h2>

<p class="text-muted">

Kelola artikel analisis SupplyChain AI

</p>

</div>

<a href="{{ route('admin.articles.create') }}"
class="btn btn-primary">

+ Add Article

</a>

</div>

@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif

<div class="card shadow-sm border-0">

<div class="table-responsive">

<table class="table table-hover align-middle mb-0">

<thead class="table-light">

<tr>

<th>Title</th>

<th>Category</th>

<th>Status</th>

<th>Author</th>

<th width="170">Action</th>

</tr>

</thead>

<tbody>

@forelse($articles as $article)

<tr>

<td>

<b>{{$article->title}}</b>

</td>

<td>

{{$article->category}}

</td>

<td>

@if($article->status=="Published")

<span class="badge bg-success">

Published

</span>

@else

<span class="badge bg-secondary">

Draft

</span>

@endif

</td>

<td>

{{$article->author->name ?? '-'}}

</td>

<td>

<a
href="{{ route('admin.articles.edit',$article) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('admin.articles.destroy',$article) }}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Delete article?')">

Delete

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5"
class="text-center text-muted">

No articles found

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

@endsection