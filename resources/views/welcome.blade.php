@extends('layouts.main')

@section('title')
Employee Management System
@endsection

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h1 class="display-4 fw-bold text-primary">Welcome Back</h1>
                        <p class="text-muted">Employee Management System Dashboard</p>
                    </div>

                    <div class="text-center">
                        @guest
                        <p class="mb-4">Please sign in to access the dashboard</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">
                            <i class="fas fa-sign-in-alt me-2"></i> Sign In
                        </a>
                        @endguest

                        @auth
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 rounded-pill">
                                <i class="fas fa-home me-2"></i> Dashboard
                            </a>

                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-lg px-4 rounded-pill">
                                    <i class="fas fa-sign-out-alt me-2"></i> {{ __('Sign Out') }}
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add this in your layout file or section --}}
@push('styles')
<style>
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }

    .display-4 {
        letter-spacing: -0.5px;
    }
</style>
@endpush
@endsection