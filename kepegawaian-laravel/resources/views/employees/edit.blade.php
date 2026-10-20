@extends('layouts.main')
@section('content')
<div class="card p-4">
    <h4>Ubah Pegawai</h4>
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf @method('PUT')
        @include('employees._form')
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection