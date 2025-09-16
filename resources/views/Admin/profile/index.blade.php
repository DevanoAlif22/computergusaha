@extends('layouts.indexAdmin')

@section('title', 'Profil Saya')

@section('content')
<div class="container">
  <h4 class="mb-4">Profil Saya</h4>

  <div class="row">
    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body text-center p-4">
          {{-- Avatar saat ini --}}
          <div class="mb-3">
            @php
              $avatarUrl = auth()->user()->avatar
                ? asset('storage/'.auth()->user()->avatar)
                : 'https://placehold.co/200x200?text=Avatar';
            @endphp
            <img id="avatarPreview" src="{{ $avatarUrl }}" alt="Avatar"
                 class="rounded-circle img-thumbnail"
                 style="width:160px;height:160px;object-fit:cover;">
          </div>
          <p class="text-muted mb-0">Ukuran maks 2 MB • jpg/png/jpeg</p>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <form action="{{ route('admin.profile.update', Auth::user()->id) }}"
                method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf @method('PUT')

            <div class="col-12">
              <label class="form-label">Nama</label>
              <input type="text" name="name"
                     class="form-control @error('name') is-invalid @enderror"
                     value="{{ old('name', auth()->user()->name) }}" required>
              @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
              <label class="form-label">Email</label>
              <input type="email" name="email"
                     class="form-control @error('email') is-invalid @enderror"
                     value="{{ old('email', auth()->user()->email) }}" required>
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-12">
              <label class="form-label">Avatar (opsional)</label>
              <input type="file" name="avatar" accept="image/*"
                     class="form-control @error('avatar') is-invalid @enderror"
                     id="avatarInput">
              @error('avatar') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <hr class="mt-3 mb-1">

            <div class="col-12">
              <label class="form-label">Password Baru (opsional)</label>
              <input type="password" name="password"
                     class="form-control @error('password') is-invalid @enderror"
                     placeholder="Kosongkan jika tidak ingin mengganti">
              @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
              <div class="form-text">Minimal 8 karakter.</div>
            </div>

            <div class="col-12">
              <label class="form-label">Konfirmasi Password Baru</label>
              <input type="password" name="password_confirmation"
                     class="form-control" placeholder="Ulangi password baru">
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

      {{-- Info akun (opsional) --}}
      <div class="card shadow-sm mt-3">
        <div class="card-body p-4">
          <div class="small text-muted">Info Akun</div>
          <div class="d-flex flex-wrap gap-3 align-items-center mt-2">
            <span><span class="text-muted">Terakhir diperbarui:</span>
              {{ auth()->user()->updated_at?->format('d M Y H:i') }}</span>
            <span class="vr"></span>
            <span><span class="text-muted">Dibuat:</span>
              {{ auth()->user()->created_at?->format('d M Y H:i') }}</span>
          </div>
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
  // Preview avatar saat file dipilih
  document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('avatarInput');
    const img   = document.getElementById('avatarPreview');
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
