@extends('layouts.main')
@section('content')
<div class="card p-4">
    <h4>Tambah Departemen</h4>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Departemen</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection