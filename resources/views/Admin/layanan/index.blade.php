@extends('layouts.indexAdmin')

@section('title', 'Layanan')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Layanan</h4>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Tombol Tambah -->
  <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
    + Tambah Layanan
  </button>

  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Gambar</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Deskripsi</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($layanans as $item)
          <tr>
            <td style="width:100px">
              @if($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="img-thumbnail">
              @endif
            </td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kategori->nama ?? '-' }}</td>
            <td>{!! Str::limit(strip_tags($item->deskripsi), 80) !!}</td>
            <td>
              <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
              <form action="{{ route('admin.layanan.destroy', $item->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
              </form>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <form action="{{ route('admin.layanan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label>Kategori</label>
                      <select name="kategorilayanan_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kat)
                          <option value="{{ $kat->id }}" {{ $item->kategorilayanan_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                    </div>
                    <div class="mb-3">
                      <label>Deskripsi</label>
                      <textarea name="deskripsi" class="form-control summernote">{!! $item->deskripsi !!}</textarea>
                    </div>
                    <div class="mb-3">
                      <label>Gambar</label><br>
                      @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}" width="100" class="mb-2 img-thumbnail">
                      @endif
                      <input type="file" name="gambar" class="form-control">
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
            <td colspan="5" class="text-center text-muted">Belum ada layanan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-3">
    {{ $layanans->links() }}
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Layanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Kategori</label>
            <select name="kategorilayanan_id" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($kategoris as $kat)
                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control summernote"></textarea>
          </div>
          <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
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
