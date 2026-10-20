@extends('layouts.main')
@section('content')
<div class="card p-4">
    <h4>Tambah Pegawai</h4>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        @include('employees._form')
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection