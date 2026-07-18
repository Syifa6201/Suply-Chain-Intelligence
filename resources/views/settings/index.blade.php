@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">

                <i class="bi bi-gear-fill text-primary"></i>

                System Settings

            </h1>

            <p class="text-muted mb-0">

                Manage your SupplyChain AI account and application settings.

            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    <div class="row g-4">

        <!-- Account -->

        <div class="col-lg-6">

            <div class="setting-card">

                <div class="setting-icon bg-primary">

                    <i class="bi bi-person-fill"></i>

                </div>

                <h3>Account</h3>

                <p>

                    Manage your profile information and password.

                </p>

                <a href="{{ route('profile.index') }}"
                   class="btn btn-primary w-100">

                    <i class="bi bi-person-circle me-2"></i>

                    Open Profile

                </a>

            </div>

        </div>

        <!-- Security -->

        <div class="col-lg-6">

            <div class="setting-card">

                <div class="setting-icon bg-danger">

                    <i class="bi bi-shield-lock-fill"></i>

                </div>

                <h3>Security</h3>

                <p>

                    Manage your account security.

                </p>

                <div class="setting-box">

                    <div class="d-flex justify-content-between mb-3">

                        <span>Account Status</span>

                        <span class="badge bg-success">

                            Active

                        </span>

                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <span>Role</span>

                        <span class="badge bg-primary">

                            {{ ucfirst(session('user_role')) }}

                        </span>

                    </div>

                    <div class="d-flex justify-content-between">

                        <span>Login Status</span>

                        <span class="text-success fw-bold">

                            Online

                        </span>

                    </div>

                </div>

                <a href="{{ route('profile.index') }}"
                   class="btn btn-danger w-100 mt-4">

                    <i class="bi bi-key-fill me-2"></i>

                    Change Password

                </a>

            </div>

        </div>

    </div>


    <!-- About -->

<div class="col-lg-12">

    <div class="setting-card">

        <div class="d-flex align-items-center mb-4">

            <div class="about-icon me-4">

                <i class="bi bi-info-circle-fill"></i>

            </div>

            <div>

                <h2 class="fw-bold mb-1">

                    About System

                </h2>

                <p class="text-muted mb-0">

                    SupplyChain AI Platform Information

                </p>

            </div>

        </div>

        <hr>

        <div class="row gy-4">

            <div class="col-md-4">

                <small class="text-muted">

                    Application

                </small>

                <h6 class="fw-bold">

                    SupplyChain AI

                </h6>

            </div>

            <div class="col-md-4">

                <small class="text-muted">

                    Framework

                </small>

                <h6 class="fw-bold">

                    Laravel 13

                </h6>

            </div>

            <div class="col-md-4">

                <small class="text-muted">

                    PHP Version

                </small>

                <h6 class="fw-bold">

                    PHP 8.3

                </h6>

            </div>

            <div class="col-md-4">

                <small class="text-muted">

                    Database

                </small>

                <h6 class="fw-bold">

                    MySQL

                </h6>

            </div>

            <div class="col-md-4">

                <small class="text-muted">

                    UI Framework

                </small>

                <h6 class="fw-bold">

                    Bootstrap 5

                </h6>

            </div>

            <div class="col-md-4">

                <small class="text-muted">

                    Version

                </small>

                <h6 class="fw-bold text-primary">

                    Version 1.0

                </h6>

            </div>

        </div>

    </div>

</div>

</div>

<style>

body{

background:#f8fafc;

}

/* ===========================
CARD
=========================== */

.setting-card{

background:#ffffff;

border-radius:22px;

padding:30px;

height:100%;

border:1px solid #e5e7eb;

box-shadow:0 10px 25px rgba(15,23,42,.08);

transition:.35s;

}

.setting-card:hover{

transform:translateY(-8px);

box-shadow:0 20px 40px rgba(2,132,199,.18);

}

.setting-card{

background:#fff;

border-radius:22px;

padding:30px;

border:1px solid #e2e8f0;

box-shadow:0 12px 35px rgba(15,23,42,.08);

transition:.35s;

height:100%;

}

.setting-card:hover{

transform:translateY(-6px);

box-shadow:0 20px 45px rgba(2,132,199,.15);

}

.setting-box{

background:#f8fafc;

padding:18px;

border-radius:14px;

margin-top:15px;

}


/* ===========================
ICON
=========================== */

.setting-icon{

width:85px;

height:85px;

margin:auto;

margin-bottom:20px;

border-radius:22px;

display:flex;

justify-content:center;

align-items:center;

font-size:34px;

color:white;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}



/* ===========================
TITLE
=========================== */

.setting-card h3{

font-weight:700;

text-align:center;

margin-bottom:10px;

color:#0f172a;

}

.setting-card p{

text-align:center;

color:#64748b;

margin-bottom:25px;

line-height:1.6;

}



/* ===========================
FORM
=========================== */

.form-label{

font-weight:600;

color:#334155;

}

.form-select{

border-radius:14px;

padding:12px;

border:1px solid #cbd5e1;

}

.form-select:focus{

box-shadow:none;

border-color:#0ea5e9;

}



/* ===========================
SWITCH
=========================== */

.form-check{

padding-left:3rem;

}

.form-check-input{

cursor:pointer;

transform:scale(1.15);

}

.form-check-label{

cursor:pointer;

font-weight:500;

}



/* ===========================
BUTTON
=========================== */

.btn{

border-radius:14px;

padding:11px;

font-weight:600;

transition:.3s;

}

.btn:hover{

transform:translateY(-2px);

}



/* ===========================
INFO BOX
=========================== */

.setting-box{

background:#f8fafc;

border-radius:16px;

padding:18px;

border:1px solid #e2e8f0;

}



/* ===========================
TABLE
=========================== */

.table td{

padding:10px 0;

border:none;

}



/* ===========================
BADGE
=========================== */

.badge{

padding:8px 12px;

border-radius:30px;

font-size:12px;

}



/* ===========================
HEADER
=========================== */

h1{

font-weight:800;

color:#0f172a;

}

.text-muted{

color:#64748b!important;

}



/* ===========================
RESPONSIVE
=========================== */

@media(max-width:992px){

.setting-card{

margin-bottom:20px;

}

}

@media(max-width:768px){

.setting-card{

padding:22px;

}

.setting-icon{

width:70px;

height:70px;

font-size:28px;

}

h1{

font-size:28px;

}

}

.about-icon{

width:80px;

height:80px;

border-radius:20px;

display:flex;

align-items:center;

justify-content:center;

background:#1f2937;

color:white;

font-size:34px;

box-shadow:0 10px 25px rgba(0,0,0,.15);

flex-shrink:0;

}

.setting-card hr{

margin:25px 0;

border-color:#e5e7eb;

}

.setting-card h6{

margin-top:6px;

font-size:17px;

}

.setting-card small{

font-size:13px;

color:#64748b;

}

</style>

@endsection