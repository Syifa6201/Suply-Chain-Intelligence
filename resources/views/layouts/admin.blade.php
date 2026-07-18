<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Panel</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="admin-body">

@include('partials.admin-sidebar')

<div class="admin-content">

@include('partials.admin-navbar')

<div class="container-fluid py-4">

@yield('content')

</div>

</div>

</body>

</html>