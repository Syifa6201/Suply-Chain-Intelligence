@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold text-dark">

                <i class="bi bi-speedometer2 text-primary"></i>

                Admin Dashboard

            </h1>

            <p class="text-muted mb-0">

                SupplyChain AI Management Center

            </p>

        </div>

        <span class="badge bg-primary fs-6 px-3 py-2">

            Administrator

        </span>

    </div>



    <div class="row g-4 mb-5">

        <div class="col-lg-4">

            <div class="stat-card">

                <div class="stat-icon bg-primary">

                    <i class="bi bi-people-fill"></i>

                </div>

                <div>

                    <h6>Total Users</h6>

                    <h2>{{ $totalUsers }}</h2>

                </div>

            </div>

        </div>



        <div class="col-lg-4">

            <div class="stat-card">

                <div class="stat-icon bg-success">

                    <i class="bi bi-geo-alt-fill"></i>

                </div>

                <div>

                    <h6>Total Ports</h6>

                    <h2>{{ $totalPorts }}</h2>

                </div>

            </div>

        </div>



        <div class="col-lg-4">

            <div class="stat-card">

                <div class="stat-icon bg-warning">

                    <i class="bi bi-newspaper"></i>

                </div>

                <div>

                    <h6>Total Articles</h6>

                    <h2>{{ $totalArticles }}</h2>

                </div>

            </div>

        </div>

    </div>



    <div class="row g-4">

        <div class="col-lg-4">

            <a href="{{ route('admin.users.index') }}" class="admin-card">

                <div class="admin-icon bg-primary">

                    <i class="bi bi-people-fill"></i>

                </div>

                <h4>User Management</h4>

                <p>
                    Tambah, edit dan hapus akun pengguna.
                </p>

            </a>

        </div>



        <div class="col-lg-4">

            <a href="{{ route('ports.index') }}" class="admin-card">

                <div class="admin-icon bg-success">

                    <i class="bi bi-anchor-fill"></i>

                </div>

                <h4>Port Dataset</h4>

                <p>
                    Kelola data pelabuhan dunia.
                </p>

            </a>

        </div>



        <div class="col-lg-4">

            <a href="{{ route('admin.articles.index') }}" class="admin-card">

                <div class="admin-icon bg-warning">

                    <i class="bi bi-journal-richtext"></i>

                </div>

                <h4>Article Analysis</h4>

                <p>
                    Kelola artikel analisis untuk pengguna.
                </p>

            </a>

        </div>

    </div>

</div>



<style>

.stat-card{

    background:#fff;

    border-radius:20px;

    padding:25px;

    display:flex;

    align-items:center;

    gap:20px;

    box-shadow:0 15px 35px rgba(15,23,42,.08);

}

.stat-card h6{

    color:#64748b;

    margin-bottom:5px;

}

.stat-card h2{

    font-weight:800;

    margin:0;

}

.stat-icon{

    width:70px;

    height:70px;

    border-radius:18px;

    display:flex;

    justify-content:center;

    align-items:center;

    color:#fff;

    font-size:30px;

}

.admin-card{

    background:#fff;

    border-radius:20px;

    padding:35px;

    display:block;

    text-decoration:none;

    color:#1e293b;

    box-shadow:0 15px 35px rgba(15,23,42,.08);

    transition:.3s;

    height:100%;

}

.admin-card:hover{

    transform:translateY(-8px);

    text-decoration:none;

    color:#1e293b;

    box-shadow:0 20px 45px rgba(37,99,235,.15);

}

.admin-icon{

    width:70px;

    height:70px;

    border-radius:18px;

    display:flex;

    justify-content:center;

    align-items:center;

    color:white;

    font-size:28px;

    margin-bottom:20px;

}

.admin-card h4{

    font-weight:700;

    margin-bottom:10px;

}

.admin-card p{

    color:#64748b;

    margin:0;

}

</style>

@endsection