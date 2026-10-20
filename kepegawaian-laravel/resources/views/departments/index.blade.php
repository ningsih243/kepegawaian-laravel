@extends('layouts.main')
@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0">Daftar Departemen</h4>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Tambah Departemen</a>
    </div>
    <table class="table table-hover align-middle">
        <thead>
            <tr><th>No</th><th>Nama Departemen</th><th>Jumlah Pegawai</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        @foreach($departments as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td><span class="badge bg-info">{{ $d->employees_count }}</span></td>
                <td>
                    <a href="{{ route('departments.edit', $d) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <form action="{{ route('departments.destroy', $d) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus departemen ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection