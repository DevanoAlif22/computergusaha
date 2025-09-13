@extends('layouts.indexAdmin')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Kategori</h4>

    <!-- Tombol Tambah -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
        + Tambah Kategori
    </button>

    <!-- Tabel Kategori -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td style="width: 150px;">
                        <!-- Tombol Edit -->
                        <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editKategoriModal{{ $category->id }}">
                            Edit
                        </button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit Kategori -->
                <div class="modal fade" id="editKategoriModal{{ $category->id }}" tabindex="-1">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                              <label>Nama Kategori</label>
                              <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label>Nama Kategori</label>
              <input type="text" name="name" class="form-control" required>
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
