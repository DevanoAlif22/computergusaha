@extends('layouts.indexAdmin')

@section('title', 'Pengaturan Situs')

@section('content')
<div class="container">
  <h4 class="mb-4">Pengaturan Situs</h4>

  <div class="row">
    {{-- KIRI: Preview Logo + Info --}}
    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body text-center p-4">
          @php
            $logoUrl = ($pengaturan?->logo)
              ? asset('storage/'.$pengaturan->logo)
              : 'https://placehold.co/200x200?text=Logo';
          @endphp
          <div class="mb-3">
            <img id="logoPreview" src="{{ $logoUrl }}" alt="Logo"
                 class="img-thumbnail"
                 style="width:200px;height:200px;object-fit:contain;background:#fff">
          </div>
          <p class="text-muted mb-0">Maks 2 MB • jpg/png/webp</p>
        </div>
      </div>

      <div class="card shadow-sm mt-3">
        <div class="card-body p-4">
          <div class="small text-muted">Info</div>
          <div class="d-flex flex-wrap gap-3 align-items-center mt-2">
            <span><span class="text-muted">Terakhir diperbarui:</span>
              {{ $pengaturan?->updated_at?->format('d M Y H:i') ?? '-' }}</span>
            <span class="vr"></span>
            <span><span class="text-muted">Dibuat:</span>
              {{ $pengaturan?->created_at?->format('d M Y H:i') ?? '-' }}</span>
          </div>
        </div>
      </div>
    </div>

    {{-- KANAN: Form --}}
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <form
            action="{{ $pengaturan?->exists
                        ? route('admin.pengaturan.update', $pengaturan->id)
                        : route('admin.pengaturan.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="row g-3">
            @csrf
            @if($pengaturan?->exists)
              @method('PUT')
            @endif

            <div class="col-12">
              <label class="form-label">Nama Website</label>
              <input type="text" name="nama_website"
                     class="form-control @error('nama_website') is-invalid @enderror"
                     value="{{ old('nama_website', $pengaturan->nama_website ?? '') }}"
                     required>
              @error('nama_website') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
              <label class="form-label">Logo (opsional)</label>
              <input type="file" name="logo" accept="image/*"
                     class="form-control @error('logo') is-invalid @enderror"
                     id="logoInput">
              @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Header</label>
              <input type="text" name="header"
                     class="form-control @error('header') is-invalid @enderror"
                     value="{{ old('header', $pengaturan->header ?? '') }}"
                     placeholder="Judul/Header di beranda">
              @error('header') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Slogan</label>
              <input type="text" name="slogan"
                     class="form-control @error('slogan') is-invalid @enderror"
                     value="{{ old('slogan', $pengaturan->slogan ?? '') }}"
                     placeholder="Slogan singkat">
              @error('slogan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email"
                     class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email', $pengaturan->email ?? '') }}"
                     placeholder="nama@domain.com">
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Nomor (Telp/WA)</label>
              <input type="text" name="nomor"
                     class="form-control @error('nomor') is-invalid @enderror"
                     value="{{ old('nomor', $pengaturan->nomor ?? '') }}"
                     placeholder="+62 8xx xxxx xxxx">
              @error('nomor') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">LinkedIn</label>
              <input type="url" name="linkedin"
                     class="form-control @error('linkedin') is-invalid @enderror"
                     value="{{ old('linkedin', $pengaturan->linkedin ?? '') }}"
                     placeholder="https://www.linkedin.com/company/...">
              @error('linkedin') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
              <label class="form-label">Instagram</label>
              <input type="url" name="instagram"
                     class="form-control @error('instagram') is-invalid @enderror"
                     value="{{ old('instagram', $pengaturan->instagram ?? '') }}"
                     placeholder="https://instagram.com/username">
              @error('instagram') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
              <label class="form-label">Footer Text</label>
              <textarea name="footer_text"
                        class="form-control @error('footer_text') is-invalid @enderror summernote"
                        rows="4"
                        placeholder="Teks footer situs (HTML diperbolehkan)">{{ old('footer_text', $pengaturan->footer_text ?? '') }}</textarea>
              @error('footer_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
    </div>

  </div>
</div>
@endsection

@section('scripts')
{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Preview logo saat file dipilih
  document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('logoInput');
    const img   = document.getElementById('logoPreview');
    if (input && img) {
      input.addEventListener('change', (e) => {
        const file = e.target.files?.[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (ev) => { img.src = ev.target.result; };
        reader.readAsDataURL(file);
      });
    }
  });

  // Flash: success
  @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: @json(session('success')),
      timer: 2000,
      showConfirmButton: false
    });
  @endif

  // Flash: errors
  @if($errors->any())
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      html: `{!! implode('<br>', $errors->all()) !!}`
    });
  @endif
</script>
@endsection
