@extends('adminlte::page')

@section('title', 'Employes Management System | Update')
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
            <div class="row my-5">
                <div class="col-md-6 mx-auto">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h3>
                        <i class="fas fa-user-plus me-2"></i> Update Employee
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" class="mt-3" action="{{ route('employes.update',$employe->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="fullname" class="form-label fw-bold">Full Name</label>
                            <input type="text" name="fullname" value="{{old('fullname',$employe->fullname)}}" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="depart">Departement</label>
                            <input type="text" class="form-control" value="{{old('depart',$employe->depart)}}" name="depart" placeholder="Departement">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="phone">Phone</label>
                            <input type="text" class="form-control" value="{{old('phone',$employe->phone)}}" placeholder="Phone" name="phone">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="address">Address</label>
                            <input type="text" class="form-control" value="{{old('address',$employe->address)}}" placeholder="Address" name="address">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="start_working">Start Working</label>
                            <input type="date" class="form-control" value="{{old('start_working',$employe->start_working)}}" placeholder="Start Working" name="start_working">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="address">Birth Date</label>
                            <input type="date" class="form-control" value="{{old('birth_date',$employe->birth_date)}}" placeholder="birth date" name="birth_date">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="role">Role</label>
                            <select class="form-control" name="role">
                                <option value="employe" {{ $employe->role == 'employe' ? 'selected' : '' }}>Employee</option>
                                <option value="admin" {{ $employe->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="rh" {{ $employe->role == 'rh' ? 'selected' : '' }}>Manager</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="id_poste">Poste</label>
                            <select class="form-control" name="id_poste">
                                @foreach($posts as $poste)
                                <option value="{{$poste->id}}" {{ $poste->id == $employe->id_poste ? 'selected' : '' }}>{{$poste->titre_poste}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold" for="id_supervisor">Superviser</label>
                            <select class="form-control" name="id_supervisor">
                                @foreach($emp as $item)
                                <option value="{{$item->id}}" {{ $item->id == $employe->id_supervisor ? 'selected' : '' }}>{{$item->fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection