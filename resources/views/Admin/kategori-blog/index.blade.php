@extends('layouts.indexAdmin')

@section('title', 'Kategori Blog')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Kategori Blog</h4>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Tombol Tambah -->
  <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
    + Tambah Kategori
  </button>

  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:80px;">#</th>
          <th>Nama</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($kategoris as $i => $kat)
          <tr>
            <td>{{ ($kategoris->currentPage() - 1) * $kategoris->perPage() + $i + 1 }}</td>
            <td>{{ $kat->nama }}</td>
            <td>
              <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $kat->id }}">Edit</button>

              <form action="{{ route('admin.kategori-blog.destroy', $kat->id) }}"
                    method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
              </form>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal{{ $kat->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('admin.kategori-blog.update', $kat->id) }}" method="POST">
                  @csrf @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" value="{{ old('nama', $kat->nama) }}" required>
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
        @empty
          <tr>
            <td colspan="3" class="text-center text-muted">Belum ada kategori.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $kategoris->links() }}
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.kategori-blog.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required placeholder="Misal: Pengumuman">
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
