@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold">

                <i class="bi bi-person-circle"></i>

                My Profile

            </h1>

            <p class="text-muted">

                Manage your SupplyChain AI account.

            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            {{ session('error') }}

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="row g-4">

        {{-- LEFT CARD --}}

        <div class="col-lg-4">

            <div class="card card-custom profile-card">

                <div class="text-center">

                    <div class="avatar">

                        <i class="bi bi-person"></i>

                    </div>

                    <h3 class="mt-4">

                        {{ $user->name }}

                    </h3>

                    <p class="text-muted">

                        {{ $user->email }}

                    </p>

                    @if($user->role=='admin')

                        <span class="badge bg-danger">

                            Administrator

                        </span>

                    @else

                        <span class="badge bg-primary">

                            User

                        </span>

                    @endif

                </div>

                <hr>

                <div class="profile-info">

                    <div class="info-item">

                        <span>🌎 Platform</span>

                        <strong>SupplyChain AI</strong>

                    </div>

                    <div class="info-item">

                        <span>🔐 Status</span>

                        <strong class="text-success">

                            Active

                        </strong>

                    </div>

                    <div class="info-item">

                        <span>📅 Joined</span>

                        <strong>

                            {{ $user->created_at->format('d M Y') }}

                        </strong>

                    </div>

                    <div class="info-item">

                        <span>🛡 Role</span>

                        <strong>

                            {{ ucfirst($user->role) }}

                        </strong>

                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT SIDE --}}

        <div class="col-lg-8">

            <div class="card card-custom p-4 mb-4">

                <h4 class="mb-4">

                    Edit Profile

                </h4>

                <form method="POST"
                      action="{{ route('profile.update') }}">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">

                            Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name',$user->name) }}">

                    </div>

                    <div class="mb-4">

                        <label class="form-label">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email',$user->email) }}">

                    </div>

                    <button class="btn btn-primary rounded-pill px-4">

                        <i class="bi bi-check-circle me-2"></i>

                        Save Profile

                    </button>

                </form>

            </div>

            <div class="card card-custom p-4">

                <h4 class="mb-4">

                    Change Password

                </h4>

                <form method="POST"
                      action="{{ route('profile.password') }}">

                    @csrf

                    <div class="mb-3">

                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            placeholder="Current Password">

                    </div>

                    <div class="mb-3">

                        <input
                            type="password"
                            name="new_password"
                            class="form-control"
                            placeholder="New Password">

                    </div>

                    <div class="mb-4">

                        <input
                            type="password"
                            name="new_password_confirmation"
                            class="form-control"
                            placeholder="Confirm New Password">

                    </div>

                    <button class="btn btn-dark rounded-pill px-4">

                        <i class="bi bi-key-fill me-2"></i>

                        Update Password

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<style>

.profile-card{

padding:35px;

}

.avatar{

width:120px;

height:120px;

margin:auto;

border-radius:50%;

display:flex;

align-items:center;

justify-content:center;

background:linear-gradient(135deg,#2563eb,#06b6d4);

color:white;

font-size:60px;

box-shadow:0 15px 35px rgba(37,99,235,.25);

}

.profile-info{

display:flex;

flex-direction:column;

gap:18px;

}

.info-item{

display:flex;

justify-content:space-between;

align-items:center;

padding:12px 0;

border-bottom:1px solid #edf2f7;

}

.info-item:last-child{

border:none;

}

.form-control{

border-radius:12px;

padding:12px 15px;

}

.btn{

font-weight:600;

}

</style>

@endsection