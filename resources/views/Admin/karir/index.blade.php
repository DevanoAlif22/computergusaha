@extends('layouts.indexAdmin')

@section('title', 'Karir')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Karir</h4>

  {{-- Baris aksi: Tambah & Cari --}}
<div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
    + Tambah Karir
  </button>

  <form method="GET" action="{{ route('admin.karir.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search"
             name="q"
             class="form-control"
             placeholder="Cari karir…"
             value="{{ $q ?? request('q') }}"
             style="min-width:220px">

      <select name="sort" class="form-select">
          <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Terbaru</option>
          <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Terlama</option>
      </select>

      @if(($q ?? request('q')) !== '' )
          <a href="{{ route('admin.karir.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif

      <button type="submit" class="btn btn-primary d-flex align-items-center">
          <i class="bi bi-search me-2"></i> Cari
      </button>
  </form>
</div>

  {{-- Ringkasan total & keyword --}}
@if(method_exists($karirs, 'total'))
    <div class="mb-2 small text-muted">
        Total: {{ $karirs->total() }}
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
          <th>No</th>
          <th>Nama</th>
          <th>Jenis</th>
          <th>Deskripsi</th>
          <th style="width:150px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($karirs as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama }}</td>
          <td>{{ $item->jenis }}</td>
          <td>{!! Str::limit(strip_tags($item->deskripsi), 80) !!}</td>
          <td>
            <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
            <form action="{{ route('admin.karir.destroy', $item->id) }}" method="POST" style="display:inline" class="delete-form">
              @csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $item->nama }}">Hapus</button>
            </form>
          </td>
        </tr>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
              <form action="{{ route('admin.karir.update', $item->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Karir</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                  </div>
                 <div class="mb-3">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="part_time" {{ $item->jenis == 'part_time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ $item->jenis == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ $item->jenis == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="freelance" {{ $item->jenis == 'freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="temporary" {{ $item->jenis == 'temporary' ? 'selected' : '' }}>Temporary</option>
                        <option value="remote" {{ $item->jenis == 'remote' ? 'selected' : '' }}>Remote</option>
                        <option value="hybrid" {{ $item->jenis == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        <option value="volunteer" {{ $item->jenis == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label>Deskripsi</label>
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
          <td colspan="5" class="text-center text-muted">
            @if(($q ?? '') !== '')
              Tidak ada hasil untuk "<b>{{ $q }}</b>".
              <a href="{{ route('admin.karir.index') }}" class="ms-1">Reset pencarian</a>
            @else
              Belum ada data karir.
            @endif
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
    @if(method_exists($karirs, 'links'))
    <div class="mt-3">
      {{ $karirs->links() }}
    </div>
  @endif
    <!-- Pagination -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form action="{{ route('admin.karir.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Karir</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Jenis</label>
            <select name="jenis" class="form-control" required>
              <option value="">-- Pilih Jenis --</option>
              <option value="part_time">Part Time</option>
              <option value="contract">Contract</option>
              <option value="internship">Internship</option>
              <option value="freelance">Freelance</option>
              <option value="temporary">Temporary</option>
              <option value="remote">Remote</option>
              <option value="hybrid">Hybrid</option>
              <option value="volunteer">Volunteer</option>
            </select>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
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
  Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: @json(session('success')),
    timer: 2000,
    showConfirmButton: false
  });
</script>
@endif

@if($errors->any())
<script>
  Swal.fire({
    icon: 'error',
    title: 'Gagal',
    html: `{!! implode('<br>', $errors->all()) !!}`
  });
</script>
@endif

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-delete').forEach(btn => {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        const form = this.closest('form');
        const name = this.dataset.name || 'karir ini';
        Swal.fire({
          title: 'Yakin hapus?',
          html: `Anda akan menghapus <b>${name}</b>.<br> Tindakan ini tidak bisa dibatalkan!`,
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