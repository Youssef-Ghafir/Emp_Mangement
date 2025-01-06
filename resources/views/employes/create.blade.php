@extends('adminlte::page')

@section('title', 'Employee Management System | Create')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* Typography */
    body,
    .card,
    .form-control,
    .btn {
        font-family: 'Poppins', sans-serif !important;
    }

    .form-control {
        padding: 0 1rem !important;
    }

    /* Card Styling */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .card-header {
        background: linear-gradient(45deg, #4361ee, #3f37c9);
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
    }

    .card-header h3 {
        color: white;
        font-weight: 600;
        font-size: 1.5rem;
        margin: 0;
    }

    .card-body {
        padding: 2rem;
    }

    /* Form Styling */
    .form-label {
        color: #2c3e50;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.15);
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }

    /* Button Styling */
    .btn {
        padding: 0.75rem 2rem;
        font-weight: 500;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #4361ee;
        border-color: #4361ee;
    }

    .btn-primary:hover {
        background-color: #3f37c9;
        border-color: #3f37c9;
        transform: translateY(-2px);
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 1.5rem;
    }

    /* Section Styling */
    .section-title {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.1rem;
        margin: 2rem 0 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #f0f0f0;
    }

    /* Alert Styling */
    .alert {
        border-radius: 10px;
        border: none;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }

        .form-control {
            padding: 0.6rem 0.8rem;
        }
    }
</style>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row my-4">
                <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h3>
                        <i class="fas fa-user-plus me-2"></i>Add New Employee
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Personal Information -->
                        <div class="section-title">Personal Information</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" placeholder="Enter full name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date" class="form-label">Birth Date</label>
                                    <input type="date" class="form-control" value="{{old('birth_date')}}" name="birth_date">
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="section-title">Contact Information</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="Enter full address">
                                </div>
                            </div>
                        </div>

                        <!-- Employment Details -->
                        <div class="section-title">Employment Details</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="depart" class="form-label">Department</label>
                                    <input type="text" class="form-control" value="{{old('depart')}}" name="depart" placeholder="Enter department">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_working" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" value="{{old('start_working')}}" name="start_working">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="employe" selected>Employe</option>
                                        <option value="admin">Admin</option>
                                        <option value="rh">Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_supervisor" class="form-label">Supervisor</label>
                                    @if (count($emp) > 0)
                                    <select class="form-control" name="id_supervisor">
                                        @foreach ($emp as $item)
                                        <option value="{{$item->id}}">{{$item->fullname}}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <p class="text-danger">No supervisor found!</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_poste" class="form-label">Position</label>
                                    @if (count($post) > 0)
                                    <select class="form-control" name="id_poste">
                                        @foreach ($post as $item)
                                        <option value="{{$item->id}}">{{$item->titre_poste}}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <p class="text-danger">No positions found!</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Account Setup -->
                        <div class="section-title">Account Setup</div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> {{ __('Create Employee') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection