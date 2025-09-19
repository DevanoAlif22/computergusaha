@extends('layouts.indexAdmin')

@section('title', 'Kategori FAQ')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen Kategori FAQ</h4>

  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
      + Tambah Kategori
    </button>

    <form method="GET" action="{{ route('admin.faq-category.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search" name="q" class="form-control" placeholder="Cari nama kategori…"
             value="{{ $q ?? request('q') }}" style="min-width:220px">

      <select name="sort_by" class="form-select">
        <option value="urutan"     {{ ($sortBy ?? 'urutan') === 'urutan' ? 'selected' : '' }}>Urut: Urutan</option>
        <option value="nama"       {{ ($sortBy ?? '') === 'nama' ? 'selected' : '' }}>Urut: Nama</option>
        <option value="created_at" {{ ($sortBy ?? '') === 'created_at' ? 'selected' : '' }}>Urut: Dibuat</option>
      </select>

      <select name="sort" class="form-select">
        <option value="asc"  {{ ($sort ?? 'asc') === 'asc' ? 'selected' : '' }}>Asc</option>
        <option value="desc" {{ ($sort ?? '') === 'desc' ? 'selected' : '' }}>Desc</option>
      </select>

      @if(($q ?? '') !== '' || ($sortBy ?? 'urutan') !== 'urutan' || ($sort ?? 'asc') !== 'asc')
        <a href="{{ route('admin.faq-category.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif

      <button type="submit" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-funnel me-2"></i> Terapkan
      </button>
    </form>
  </div>

  @if(method_exists($categories, 'total'))
    <div class="mb-2 small text-muted">
      Total: {{ $categories->total() }}
      @if(($q ?? '') !== '')
        • Keyword: "<b>{{ $q }}</b>"
      @endif
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:100px;">Urutan</th>
          <th>Nama</th>
          <th style="width:140px;">Jumlah FAQ</th>
          <th style="width:220px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $cat)
        <tr>
          <td><span class="badge bg-secondary">{{ $cat->urutan }}</span></td>
          <td>{{ $cat->nama }}</td>
          <td><span class="badge bg-info text-dark">{{ $cat->faqs_count }}</span></td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditKategori{{ $cat->id }}">Edit</button>

            <form action="{{ route('admin.faq-category.destroy', $cat->id) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('Hapus kategori? Pastikan tidak ada FAQ di dalamnya.')">
                Hapus
              </button>
            </form>
          </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="modalEditKategori{{ $cat->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="{{ route('admin.faq-category.update', $cat->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Kategori FAQ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $cat->nama }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="urutan" class="form-control" value="{{ $cat->urutan }}" min="0">
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
            <td colspan="4" class="text-center text-muted">Belum ada kategori.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $categories->links() }}
  </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.faq-category.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori FAQ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Urutan</label>
            <input type="number" name="urutan" class="form-control" min="0" value="0">
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
@endsection
