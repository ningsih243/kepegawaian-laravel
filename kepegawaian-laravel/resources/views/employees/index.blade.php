@extends('layouts.main')
@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0">Daftar Pegawai</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Tambah Pegawai</a>
    </div>
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>No</th><th>Nama</th><th>Departemen</th><th>Jabatan</th>
                <th>Gaji</th><th>Tanggal Bergabung</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $e)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $e->name }}</td>
                <td><span class="badge bg-primary">{{ $e->department->name }}</span></td>
                <td>{{ $e->position }}</td>
                <td>Rp {{ number_format($e->salary, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($e->joined_at)->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('employees.edit', $e) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <form action="{{ route('employees.destroy', $e) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Hapus pegawai ini?')">
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