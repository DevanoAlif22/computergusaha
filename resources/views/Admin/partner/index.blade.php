@extends('layouts.indexAdmin')

@section('title', 'Partners')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Partners</h4>

  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
      + Tambah Partner
    </button>

    <form method="GET" action="{{ route('admin.partner.index') }}" class="d-flex align-items-center gap-2 w-full">
      <select name="sort" class="form-select">
        <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Terbaru</option>
        <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Terlama</option>
      </select>
      @if(($sort ?? 'desc') !== 'desc')
        <a href="{{ route('admin.partner.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif
      <button type="submit" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-funnel me-2"></i> Terapkan
      </button>
    </form>
  </div>

  @if(method_exists($partners, 'total'))
    <div class="mb-2 small text-muted">
      Total: {{ $partners->total() }}
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:120px;">Logo</th>
          <th style="width:220px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($partners as $item)
        <tr>
          <td>
            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" width="100" class="img-thumbnail" alt="logo">
            @else
              <span class="text-muted">Belum ada gambar</span>
            @endif
          </td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

            <form action="{{ route('admin.partner.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
              @csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus</button>
            </form>
          </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="overflow-y:auto">
              <form action="{{ route('admin.partner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Partner</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Logo (gambar)</label><br>
                    @if($item->gambar)
                      <img src="{{ asset('storage/'.$item->gambar) }}" width="120" class="mb-2 img-thumbnail" alt="logo">
                    @endif
                    <input type="file" name="gambar" class="form-control">
                    <small class="text-muted">Maks 2 MB. Format: JPG/PNG/WebP.</small>
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
            <td colspan="2" class="text-center text-muted">
              Belum ada partner.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $partners->links() }}
  </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="overflow-y:auto">
      <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Partner</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Logo (gambar)</label>
            <input type="file" name="gambar" class="form-control" required>
            <small class="text-muted">Maks 2 MB. Format: JPG/PNG/WebP.</small>
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

@section('scripts')
  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- Flash: success --}}
  @if(session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: @json(session('success')),
      timer: 2000,
      showConfirmButton: false
    });
  </script>
  @endif

  {{-- Flash: errors --}}
  @if($errors->any())
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Gagal',
      html: `{!! implode('<br>', $errors->all()) !!}`
    });
  </script>
  @endif

  {{-- Konfirmasi hapus --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          const form = this.closest('form');
          Swal.fire({
            title: 'Yakin hapus?',
            html: `Tindakan ini tidak bisa dibatalkan!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });
  </script>
@endsection
