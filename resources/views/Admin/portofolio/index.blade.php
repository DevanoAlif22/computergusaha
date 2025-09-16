@extends('layouts.indexAdmin')

@section('title', 'Portofolio')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Portofolio</h4>

 <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
    + Tambah Kategori
  </button>

  <form method="GET" action="{{ route('admin.portofolio.index') }}" class="d-flex align-items-center gap-2 ms-auto">
    <input type="search"
           name="q"
           class="form-control"
           placeholder="Cari portofolio…"
           value="{{ $q ?? request('q') }}"
           style="min-width:260px">
    @if(($q ?? request('q')) !== null && ($q ?? request('q')) !== '')
      <a href="{{ route('admin.portofolio.index') }}" class="btn btn-outline-secondary">Reset</a>
    @endif
    <button type="submit" class="d-flex btn btn-primary">
      <i class="bi bi-search me-2"></i> Cari
    </button>
  </form>
</div>
{{-- Ringkasan total & keyword --}}
@if(method_exists($portofolio, 'total'))
    <div class="mb-2 small text-muted">
        Total: {{ $portofolio->total() }}
        @if(($q ?? '') !== '')
            • Keyword: "<b>{{ $q }}</b>"
        @endif
    </div>
@endif



  <!-- Tabel -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Deskripsi</th>
          <th style="width:150px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($portofolio as $item)
        <tr>
          <td style="width:100px">
            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="img-thumbnail">
            @endif
          </td>
          <td>{{ $item->judul }}</td>
          <td>{{ $item->category ? $item->category->name : '-' }}</td>
          <td>{!! Str::limit(strip_tags($item->deskripsi), 80) !!}</td>
          <td>
            <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
            <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" style="display:inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
          </td>
        </tr>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
              <form action="{{ route('admin.portofolio.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Portofolio</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                  </div>
                  <div class="mb-3">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control" required>
                      <option value="">-- Pilih Kategori --</option>
                      @foreach($categories as $kat)
                        <option value="{{ $kat->id }}" {{ $item->category_id == $kat->id ? 'selected' : '' }}>
                          {{ $kat->name }}
                        </option>
                      @endforeach
                    </select>
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
        @endforeach
      </tbody>
    </table>
  </div>
  @if(method_exists($portofolio, 'links'))
    <div class="mt-3">
      {{ $portofolio->links() }}
    </div>
  @endif
    <!-- Pagination -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content" style="overflow-x: scroll; overflow-y: scroll;">
      <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Portofolio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $kat)
                <option value="{{ $kat->id }}">{{ $kat->name }}</option>
              @endforeach
            </select>
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
