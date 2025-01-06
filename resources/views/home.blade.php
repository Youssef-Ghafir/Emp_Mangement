@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* Typography */
    body,
    h1,
    h2,
    h3,
    p,
    .btn {
        font-family: 'Poppins', sans-serif !important;
    }

    /* Dashboard Header */
    .content-header h1 {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.75rem;
        margin-bottom: 1.5rem;
    }

    /* Stats Cards */
    .stat-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.12);
    }

    .stat-card .inner {
        padding: 2rem;
        position: relative;
        z-index: 1;
    }

    .stat-card h3 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .stat-card p {
        color: #64748b;
        font-size: 1rem;
        margin: 0;
        font-weight: 500;
    }

    .stat-card .icon {
        position: absolute;
        right: 2rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 3rem;
        opacity: 0.2;
        transition: all 0.3s ease;
    }

    .stat-card:hover .icon {
        opacity: 0.3;
        transform: translateY(-50%) scale(1.1);
    }

    .stat-card .footer {
        background: rgba(0, 0, 0, 0.05);
        padding: 0.75rem;
        text-align: center;
    }

    .stat-card .footer a {
        color: #64748b;
        text-decoration: none;
        font-weight: 500;
        display: block;
        transition: all 0.3s ease;
    }

    .stat-card .footer a:hover {
        color: #2c3e50;
    }

    .stat-card .footer i {
        margin-left: 0.5rem;
        transition: all 0.3s ease;
    }

    .stat-card .footer a:hover i {
        transform: translateX(5px);
    }

    /* Card Variants */
    .stat-card.primary {
        background: linear-gradient(45deg, #4361ee, #3f37c9);
    }

    .stat-card.success {
        background: linear-gradient(45deg, #2ec946, #24a93a);
    }

    .stat-card.warning {
        background: linear-gradient(45deg, #f7b731, #f5a811);
    }

    .stat-card.danger {
        background: linear-gradient(45deg, #ff6b6b, #ff5252);
    }

    .stat-card[class*="primary"],
    .stat-card[class*="success"],
    .stat-card[class*="warning"],
    .stat-card[class*="danger"] {
        color: white;
    }

    .stat-card[class*="primary"] h3,
    .stat-card[class*="success"] h3,
    .stat-card[class*="warning"] h3,
    .stat-card[class*="danger"] h3,
    .stat-card[class*="primary"] p,
    .stat-card[class*="success"] p,
    .stat-card[class*="warning"] p,
    .stat-card[class*="danger"] p {
        color: white;
    }

    .stat-card[class*="primary"] .icon,
    .stat-card[class*="success"] .icon,
    .stat-card[class*="warning"] .icon,
    .stat-card[class*="danger"] .icon {
        color: white;
    }

    .stat-card[class*="primary"] .footer,
    .stat-card[class*="success"] .footer,
    .stat-card[class*="warning"] .footer,
    .stat-card[class*="danger"] .footer {
        background: rgba(255, 255, 255, 0.1);
    }

    .stat-card[class*="primary"] .footer a,
    .stat-card[class*="success"] .footer a,
    .stat-card[class*="warning"] .footer a,
    .stat-card[class*="danger"] .footer a {
        color: white;
    }
</style>
@stop

@section('content_header')
<h1><i class="fas fa-tachometer-alt me-2"></i> Dashboard Overview</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="stat-card primary">
            <div class="inner">
                <h3>{{\App\Models\Employe::count()}}</h3>
                <p>Total Employees</p>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
            <div class="footer">
                <a href="{{url('admin/employes')}}">
                    View Details <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card success">
            <div class="inner">
                <h3>{{\App\Models\Employe::where('role', 'employee')->count()}}</h3>
                <p>Active Employees</p>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
            </div>
            <div class="footer">
                <a href="{{url('admin/employes?role=employee')}}">
                    View Details <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card warning">
            <div class="inner">
                <h3>{{\App\Models\Employe::where('role', 'manager')->count()}}</h3>
                <p>Managers</p>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
            </div>
            <div class="footer">
                <a href="{{url('admin/employes?role=manager')}}">
                    View Details <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card danger">
            <div class="inner">
                <h3>{{\App\Models\Employe::where('role', 'admin')->count()}}</h3>
                <p>Administrators</p>
                <div class="icon">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
            <div class="footer">
                <a href="{{url('admin/employes?role=admin')}}">
                    View Details <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
    // Add any JavaScript enhancements here
</script>
@stop