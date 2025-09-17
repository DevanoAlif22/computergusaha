@extends('layouts.indexAdmin')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Kategori</h4>

<!-- Tombol Tambah -->
<!-- Tombol Tambah -->
<div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
    + Tambah Kategori
  </button>

  <form method="GET" action="{{ route('admin.category.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search"
             name="q"
             class="form-control"
             placeholder="Cari kategori…"
             value="{{ $q ?? request('q') }}"
             style="min-width:220px">

      <select name="sort" class="form-select">
          <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Terbaru</option>
          <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Terlama</option>
      </select>

      {{-- Tombol reset hanya muncul kalau ada query --}}
      @if(($q ?? request('q')) !== '' || request('sort') !== 'desc')
          <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif

      <button type="submit" class="btn btn-primary d-flex align-items-center">
          <i class="bi bi-search me-2"></i> Cari
      </button>
  </form>
</div>



{{-- Ringkasan total & keyword --}}
@if(method_exists($categories, 'total'))
    <div class="mb-2 small text-muted">
        Total: {{ $categories->total() }}
        @if(($q ?? '') !== '')
            • Keyword: "<b>{{ $q }}</b>"
        @endif
    </div>
@endif

    <!-- Tabel Kategori -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration + ($categories->currentPage()-1) * $categories->perPage() }}</td>

                    <td>{{ $category->name }}</td>
                    <td style="width: 150px;">
                        <!-- Tombol Edit -->
                        <button class="btn btn-sm btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editKategoriModal{{ $category->id }}">
                            Edit
                        </button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline" class="delete-form">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $category->name }}">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit Kategori -->
                <div class="modal fade" id="editKategoriModal{{ $category->id }}" tabindex="-1">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Kategori</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                              <label>Nama Kategori</label>
                              <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
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
      @if(method_exists($categories, 'links'))
    <div class="mt-3">
      {{ $categories->links() }}
    </div>
  @endif
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label>Nama Kategori</label>
              <input type="text" name="name" class="form-control" required>
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
        const name = this.dataset.name || 'kategori ini';
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