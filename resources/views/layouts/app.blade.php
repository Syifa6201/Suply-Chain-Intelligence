<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply Chain Intelligence</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body{
            background:linear-gradient(to right,#eef2ff,#f8fafc);
            font-family:Arial, sans-serif;
        }

        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            background:linear-gradient(180deg,#020617,#0f172a,#1e293b);
            color:white;
            padding:25px;
        }

        .sidebar h3{
            margin-bottom:30px;
            font-weight:bold;
        }

        .sidebar a{
            display:block;
            color:#cbd5e1;
            text-decoration:none;
            padding:12px;
            margin-bottom:8px;
            border-radius:10px;
        }

        .sidebar a:hover{
            background:#1e293b;
            color:white;
        }

        .main{
            margin-left:260px;
            padding:30px;
        }

        .card-custom{
            border:none;
            border-radius:22px;
            box-shadow:0 10px 30px rgba(15,23,42,.08);
            transition:.3s;
        }

        .card-custom:hover{
            transform:translateY(-4px);
        }

        table{
            border-radius:15px;
            overflow:hidden;
        }

        .table thead{
            background:#f8fafc;
        }

        .table tbody tr{
            transition:.2s;
        }

        .table tbody tr:hover{
            background:#eff6ff;
        }

        .badge{
            padding:8px 12px;
            font-size:14px;
            border-radius:999px;
        }

        .news-title{
            display:-webkit-box;
            -webkit-line-clamp:2;
            -webkit-box-orient:vertical;
            overflow:hidden;
        }
    </style>
</head>
<body>

<div class="sidebar">
    @include('partials.sidebar')
</div>

<div class="main">
    @include('partials.navbar')
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>