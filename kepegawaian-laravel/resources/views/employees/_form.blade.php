<div class="mb-3">
    <label class="form-label">Departemen</label>
    <select name="department_id" class="form-select">
        <option value="">-- Pilih Departemen --</option>
        @foreach($departments as $d)
            <option value="{{ $d->id }}"
                {{ old('department_id', $employee->department_id ?? '') == $d->id ? 'selected' : '' }}>
                {{ $d->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Nama Pegawai</label>
    <input type="text" name="name" value="{{ old('name', $employee->name ?? '') }}" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Jabatan</label>
    <input type="text" name="position" value="{{ old('position', $employee->position ?? '') }}" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Gaji</label>
    <input type="text" name="salary" value="{{ old('salary', isset($employee) ? (int) $employee->salary : '') }}" class="form-control">
</div>
<div class="mb-3">
    <label class="form-label">Tanggal Bergabung</label>
    <input type="date" name="joined_at" value="{{ old('joined_at', isset($employee) ? \Carbon\Carbon::parse($employee->joined_at)->format('Y-m-d') : '') }}" class="form-control">
</div>