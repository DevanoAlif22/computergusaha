@extends('layouts.indexAdmin')

@section('title', 'Portofolio')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Portofolio</h4>

  <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
    + Tambah Portofolio
  </button>

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
          <td>{{ $item->kategori }}</td>
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
                    <select name="kategori" class="form-control" required>
                      @php $kats = ['IT Consultation','Data Security','Website Development','UI/UX Design','Cloud Service','Game Development']; @endphp
                      <option value="">-- Pilih Kategori --</option>
                      @foreach($kats as $kat)
                        <option value="{{ $kat }}" {{ $item->kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
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
            <select name="kategori" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="IT Consultation">IT Consultation</option>
              <option value="Data Security">Data Security</option>
              <option value="Website Development">Website Development</option>
              <option value="UI/UX Design">UI/UX Design</option>
              <option value="Cloud Service">Cloud Service</option>
              <option value="Game Development">Game Development</option>
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
