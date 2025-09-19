@extends('layouts.indexAdmin')

@section('title', 'Ecosystem')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Ecosystem</h4>

  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
      + Tambah Ecosystem
    </button>

    <form method="GET" action="{{ route('admin.ecosystem.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search" name="q" class="form-control" placeholder="Cari link…" value="{{ $q ?? request('q') }}" style="min-width:220px">
      <select name="sort" class="form-select">
        <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Terbaru</option>
        <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Terlama</option>
      </select>
      @if(($q ?? '') !== '' || ($sort ?? 'desc') !== 'desc')
        <a href="{{ route('admin.ecosystem.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif
      <button type="submit" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-funnel me-2"></i> Terapkan
      </button>
    </form>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:140px;">Gambar</th>
          <th>Link</th>
          <th style="width:220px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($ecosystems as $item)
        <tr>
          <td>
            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" width="120" class="img-thumbnail" alt="ecosystem">
            @else
              <span class="text-muted">Belum ada gambar</span>
            @endif
          </td>
          <td>
            @if($item->link)
              <a href="{{ $item->link }}" target="_blank" rel="noopener">{{ $item->link }}</a>
            @else
              <span class="text-muted">-</span>
            @endif
          </td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
            <form action="{{ route('admin.ecosystem.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
              @csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus</button>
            </form>
          </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="overflow-y:auto">
              <form action="{{ route('admin.ecosystem.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Ecosystem</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Gambar</label><br>
                    @if($item->gambar)
                      <img src="{{ asset('storage/'.$item->gambar) }}" width="120" class="mb-2 img-thumbnail" alt="ecosystem">
                    @endif
                    <input type="file" name="gambar" class="form-control">
                    <small class="text-muted">Maks 2 MB. JPG/PNG/WebP.</small>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="url" name="link" class="form-control" value="{{ $item->link }}" placeholder="https://...">
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
          <tr><td colspan="3" class="text-center text-muted">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $ecosystems->links() }}
  </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="overflow-y:auto">
      <form action="{{ route('admin.ecosystem.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Ecosystem</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
            <small class="text-muted">Maks 2 MB. JPG/PNG/WebP.</small>
          </div>
          <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="url" name="link" class="form-control" placeholder="https://...">
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session('success'))
  <script>
    Swal.fire({ icon:'success', title:'Berhasil', text:@json(session('success')), timer:2000, showConfirmButton:false });
  </script>
  @endif
  @if($errors->any())
  <script>
    Swal.fire({ icon:'error', title:'Gagal', html:`{!! implode('<br>', $errors->all()) !!}` });
  </script>
  @endif
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          const form = this.closest('form');
          Swal.fire({
            title: 'Yakin hapus?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
          }).then((result) => { if (result.isConfirmed) form.submit(); });
        });
      });
    });
  </script>
@endsection
