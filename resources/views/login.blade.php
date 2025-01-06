@extends('layouts.main')

@section('title')
Employee Management System | Login
@endsection

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="row w-100 justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <h1 class="display-6 fw-bold text-primary">Employee Management</h1>
                <p class="text-muted">Sign in to access your dashboard</p>
            </div>

            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mb-4">
                            <input id="email" type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="off"
                                placeholder="name@example.com">
                            <label for="email">{{ __('Email Address') }}</label>
                            @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-4">
                            <input id="password" type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="off"
                                placeholder="Password">
                            <label for="password">{{ __('Password') }}</label>
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill py-3">
                                <i class="fas fa-sign-in-alt me-2"></i>{{ __('Sign In') }}
                            </button>
                        </div>


                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small">
                    <i class="fas fa-shield-alt me-1"></i>
                    Secure login powered by Employee Management System
                </p>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .form-floating>.form-control {
        height: calc(3.5rem + 2px);
        padding: 1rem 0.75rem;
    }

    .form-floating>label {
        padding: 1rem 0.75rem;
    }

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

    .form-control {
        border: 1px solid #e0e0e0;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }

    .invalid-feedback {
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }
</style>
@endpush
@endsection