@extends('layouts.main')
@section('content')
<h4 class="mb-3">Dasbor</h4>
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card p-4 text-white" style="background: linear-gradient(90deg,#4f46e5,#7c3aed)">
            <div><i class="bi bi-people"></i> Total Pegawai</div>
            <h2 class="mb-0">{{ $totalEmployees }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-white" style="background: linear-gradient(90deg,#0ea5e9,#06b6d4)">
            <div><i class="bi bi-diagram-3"></i> Total Departemen</div>
            <h2 class="mb-0">{{ $totalDepartments }}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 text-white" style="background: linear-gradient(90deg,#10b981,#059669)">
            <div><i class="bi bi-cash-stack"></i> Total Gaji</div>
            <h2 class="mb-0">Rp {{ number_format($totalSalary, 0, ',', '.') }}</h2>
        </div>
    </div>
</div>

<div class="card p-4">
    <h5>Pegawai per Departemen</h5>
    <ul class="list-group list-group-flush">
        @foreach($departments as $d)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $d->name }}
                <span class="badge bg-primary rounded-pill">{{ $d->employees_count }} pegawai</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection