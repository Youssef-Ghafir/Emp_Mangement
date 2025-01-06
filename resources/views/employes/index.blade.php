@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Employees List')

@section('content_header')
@stop

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* Typography */
    body,
    .table,
    .btn,
    .swal2-popup {
        font-family: 'Poppins', sans-serif !important;
    }

    /* Card Styling */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.12);
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
    }

    .card-header h3 {
        font-weight: 600;
        font-size: 1.5rem;
        color: #2c3e50;
        margin: 0;
    }

    /* Table Styling */
    .table {
        font-size: 0.95rem;
    }

    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        background-color: #f8f9fa;
        padding: 1rem;
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }

    /* Button Styling */
    .btn {
        font-weight: 500;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
    }

    .btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.875rem;
    }

    .btn i {
        font-size: 0.9rem;
    }

    .btn-primary {
        background-color: #4361ee;
        border-color: #4361ee;
    }

    .btn-warning {
        background-color: #f7b731;
        border-color: #f7b731;
        color: white;
    }

    .btn-danger {
        background-color: #ff6b6b;
        border-color: #ff6b6b;
    }

    /* DataTables Styling */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 0.4rem 0.8rem;
        font-size: 0.95rem;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px;
        font-weight: 500;
    }

    /* Action Buttons Container */
    .action-buttons {
        gap: 0.5rem;
    }

    /* Sweet Alert Customization */
    .swal2-popup {
        border-radius: 15px;
        padding: 2rem;
    }

    .swal2-title {
        font-weight: 600;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-header h3 {
            font-size: 1.25rem;
        }

        .table {
            font-size: 0.875rem;
        }
    }
</style>
@stop

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="row my-4">
            <div class="col-md-6 mx-auto">
                @include('layouts.alert')
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Employee Directory</h3>
                    <a href="{{ route('employes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Add Employee
                    </a>
                </div>
            </div>
            <div class="card-body p-4">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Department</th>
                            <th>Hire Date</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $employe)
                        <tr>
                            <td>{{$employe->id}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3">
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($employe->fullname, 0, 2)) }}
                                        </div>
                                    </div>
                                    <div>{{$employe->fullname}}</div>
                                </div>
                            </td>
                            <td>{{$employe->depart}}</td>
                            <td>{{$employe->start_working}}</td>
                            <td><span class="badge bg-info">{{$employe->role}}</span></td>
                            <td>
                                <div class="d-flex action-buttons">
                                    <a href="{{route('employes.show',$employe->id)}}" class="btn btn-sm btn-primary" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('employes.edit',$employe->id)}}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="{{$employe->id}}" action="{{route('employes.destroy',$employe->id)}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <button onclick="deleteAd('{{$employe->id}}')" type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: '<"d-flex justify-content-between align-items-center mb-4"Bf>rtip',
            buttons: [{
                    extend: 'collection',
                    text: '<i class="fas fa-download me-2"></i>Export',
                    buttons: ['copy', 'excel', 'csv', 'pdf', 'print']
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns me-2"></i>Columns'
                }
            ],
            pageLength: 10,
            language: {
                search: "",
                searchPlaceholder: "Search employees..."
            }
        });
    });

    function deleteAd(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4361ee',
            cancelButtonColor: '#ff6b6b',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            customClass: {
                confirmButton: 'btn btn-primary me-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(id).submit();
            }
        });
    }
</script>

@if(session()->has("success"))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{session()->get('success')}}",
        showConfirmButton: false,
        timer: 2500,
        toast: true
    });
</script>
@endif
@stop