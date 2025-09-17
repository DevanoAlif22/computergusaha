@extends('layouts.indexAdmin')

@section('title', 'Journey')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Journey</h4>

  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
      + Tambah Journey
    </button>

    <form method="GET" action="{{ route('admin.journey.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search" name="q" class="form-control" placeholder="Cari nama/deskripsi…"
             value="{{ $q ?? request('q') }}" style="min-width:220px">

      <select name="tahun" class="form-select" style="min-width:140px">
        <option value="">Semua Tahun</option>
        @foreach($years as $y)
          <option value="{{ $y }}" {{ (string)($tahun ?? '') === (string)$y ? 'selected' : '' }}>{{ $y }}</option>
        @endforeach
      </select>

      <select name="sort_by" class="form-select">
        <option value="tahun"      {{ ($sortBy ?? 'tahun') === 'tahun' ? 'selected' : '' }}>Urut: Tahun</option>
        <option value="nama"       {{ ($sortBy ?? '') === 'nama' ? 'selected' : '' }}>Urut: Nama</option>
        <option value="created_at" {{ ($sortBy ?? '') === 'created_at' ? 'selected' : '' }}>Urut: Dibuat</option>
      </select>

      <select name="sort" class="form-select">
        <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Desc</option>
        <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Asc</option>
      </select>

      @if(($q ?? request('q')) !== '' || ($tahun ?? '') !== '' || ($sortBy ?? 'tahun') !== 'tahun' || ($sort ?? 'desc') !== 'desc')
        <a href="{{ route('admin.journey.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif

      <button type="submit" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-funnel me-2"></i> Terapkan
      </button>
    </form>
  </div>

  @if(method_exists($journeys, 'total'))
    <div class="mb-2 small text-muted">
      Total: {{ $journeys->total() }}
      @if(($q ?? '') !== '')
        • Keyword: "<b>{{ $q }}</b>"
      @endif
      @if(($tahun ?? '') !== '')
        • Tahun: <b>{{ $tahun }}</b>
      @endif
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:100px;">Tahun</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($journeys as $item)
        <tr>
          <td><span class="badge bg-secondary">{{ $item->tahun }}</span></td>
          <td>{{ $item->nama }}</td>
          <td>{!! Str::limit(strip_tags($item->deskripsi), 120) !!}</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
            <form action="{{ route('admin.journey.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
              @csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $item->nama }}">Hapus</button>
            </form>
          </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y:auto">
              <form action="{{ route('admin.journey.update', $item->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Journey</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun" class="form-control" value="{{ $item->tahun }}" required min="1900" max="{{ date('Y') + 10 }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control summernote">{!! $item->deskripsi !!}</textarea>
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
            <td colspan="4" class="text-center text-muted">
              @if(($q ?? '') !== '')
                Tidak ada hasil untuk "<b>{{ $q }}</b>".
                <a href="{{ route('admin.journey.index') }}" class="ms-1">Reset</a>
              @else
                Belum ada journey.
              @endif
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $journeys->links() }}
  </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content" style="overflow-y:auto">
      <form action="{{ route('admin.journey.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Journey</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" class="form-control" required min="1900" max="{{ date('Y') + 10 }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control summernote"></textarea>
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
    Swal.fire({ icon: 'success', title: 'Berhasil', text: @json(session('success')), timer: 2000, showConfirmButton: false });
  </script>
  @endif

  @if($errors->any())
  <script>
    Swal.fire({ icon: 'error', title: 'Gagal', html: `{!! implode('<br>', $errors->all()) !!}` });
  </script>
  @endif

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          const form = this.closest('form');
          const name = this.dataset.name || 'data ini';
          Swal.fire({
            title: 'Yakin hapus?',
            html: `Anda akan menghapus <b>${name}</b>.<br> Tindakan ini tidak bisa dibatalkan!`,
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
