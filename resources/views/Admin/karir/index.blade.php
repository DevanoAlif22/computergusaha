@extends('layouts.indexAdmin')

@section('title', 'Karir')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Karir</h4>

  <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
    + Tambah Karir
  </button>

  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jenis</th>
          <th>Deskripsi</th>
          <th style="width:150px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($karirs as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->jenis }}</td>
          <td>{!! Str::limit(strip_tags($item->deskripsi), 80) !!}</td>
          <td>
            <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
            <form action="{{ route('admin.karir.destroy', $item->id) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
          </td>
        </tr>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
              <form action="{{ route('admin.karir.update', $item->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Karir</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                  </div>
                 <div class="mb-3">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="part_time" {{ $item->jenis == 'part_time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ $item->jenis == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ $item->jenis == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="freelance" {{ $item->jenis == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="temporary" {{ $item->jenis == 'temporary' ? 'selected' : '' }}>Temporary</option>
                        <option value="remote" {{ $item->jenis == 'remote' ? 'selected' : '' }}>Remote</option>
                        <option value="hybrid" {{ $item->jenis == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        <option value="volunteer" {{ $item->jenis == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                    </select>
                    </div>

                  <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control summernote">{!! $item->deskripsi !!}</textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Update</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form action="{{ route('admin.karir.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Karir</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
        <div class="mb-3">
  <label>Jenis</label>
  <select name="jenis" class="form-control" required>
    <option value="">-- Pilih Jenis --</option>
    <option value="part_time">Part Time</option>
    <option value="contract">Contract</option>
    <option value="internship">Internship</option>
    <option value="freelance">Freelance</option>
    <option value="temporary">Temporary</option>
    <option value="remote">Remote</option>
    <option value="hybrid">Hybrid</option>
    <option value="volunteer">Volunteer</option>
  </select>
</div>

          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control summernote"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
