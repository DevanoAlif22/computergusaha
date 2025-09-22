@extends('layouts.indexAdmin')

@section('title', $title ?? 'Halaman')

@section('content')
<div class="container">
  <h4 class="mb-4">{{ $title ?? 'Halaman' }}</h4>

  <div class="card shadow-sm">
    <div class="card-body p-4">
      <form
        action="{{ $item?->exists ? route($routeBase.'.update', $item->id) : route($routeBase.'.store') }}"
        method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @if($item?->exists) @method('PUT') @endif

        <div class="col-12">
          <label class="form-label">Judul</label>
          <input type="text" name="judul"
                 class="form-control @error('judul') is-invalid @enderror"
                 value="{{ old('judul', $item->judul ?? '') }}" required>
          @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-12">
          <label class="form-label">Gambar (opsional)</label>
          <input type="file" name="gambar" accept="image/*"
                 class="form-control @error('gambar') is-invalid @enderror">
          @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
          <div class="form-text">Maks 2 MB • jpg/png/webp</div>
        </div>

        <div class="col-12">
          <label class="form-label">Deskripsi</label>
          <textarea name="deskripsi"
                    class="form-control @error('deskripsi') is-invalid @enderror summernote"
                    rows="6"
                    placeholder="Tuliskan deskripsi…">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
          @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-12 d-flex gap-2 justify-content-end mt-2">
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Simpan Perubahan
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>

  @if($item?->exists)
  <div class="card shadow-sm mt-3">
    <div class="card-body p-4">
      <form action="{{ route($routeBase.'.destroy', $item->id) }}" method="POST"
            onsubmit="return confirm('Yakin hapus halaman ini?')">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">
          <i class="bi bi-trash me-1"></i> Hapus
        </button>
        <span class="text-muted ms-2 small">Akan menghapus data beserta gambar.</span>
      </form>
    </div>
  </div>
  @endif
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Flash
  @if(session('success'))
    Swal.fire({ icon:'success', title:'Berhasil', text:@json(session('success')), timer:2000, showConfirmButton:false });
  @endif
  @if($errors->any())
    Swal.fire({ icon:'error', title:'Gagal', html:`{!! implode('<br>', $errors->all()) !!}` });
  @endif
</script>
@endsection
