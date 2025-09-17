@extends('layouts.indexAdmin')

@section('title', 'CEO')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen CEO</h4>

  {{-- Baris aksi: Tambah (kiri) & Cari+Sort (kanan) --}}
  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
      + Tambah CEO
    </button>

    <form method="GET" action="{{ route('admin.ceo.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search"
             name="q"
             class="form-control"
             placeholder="Cari nama/deskripsi…"
             value="{{ $q ?? request('q') }}"
             style="min-width:220px">

      <select name="sort" class="form-select">
        <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Terbaru</option>
        <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Terlama</option>
      </select>

      @if(($q ?? request('q')) !== '')
        <a href="{{ route('admin.ceo.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif

      <button type="submit" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-search me-2"></i> Cari
      </button>
    </form>
  </div>

  {{-- ringkasan --}}
  @if(method_exists($ceos, 'total'))
    <div class="mb-2 small text-muted">
      Total: {{ $ceos->total() }}
      @if(($q ?? '') !== '')
        • Keyword: "<b>{{ $q }}</b>"
      @endif
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th style="width:100px;">Gambar</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($ceos as $item)
        <tr>
          <td>
            @if($item->gambar)
              <img src="{{ asset('storage/'.$item->gambar) }}" width="80" class="img-thumbnail" alt="gambar">
            @endif
          </td>
          <td>{{ $item->nama }}</td>
          <td>{!! Str::limit(strip_tags($item->deskripsi), 100) !!}</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>

            <form action="{{ route('admin.ceo.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
              @csrf @method('DELETE')
              <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $item->nama }}">Hapus</button>
            </form>
          </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y:auto">
              <form action="{{ route('admin.ceo.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit CEO</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    {{-- jika pakai Summernote, class "summernote" sudah inline --}}
                    <textarea name="deskripsi" class="form-control summernote">{!! $item->deskripsi !!}</textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Gambar</label><br>
                    @if($item->gambar)
                      <img src="{{ asset('storage/'.$item->gambar) }}" width="100" class="mb-2 img-thumbnail" alt="gambar">
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
        @empty
          <tr>
            <td colspan="4" class="text-center text-muted">
              @if(($q ?? '') !== '')
                Tidak ada hasil untuk "<b>{{ $q }}</b>". <a href="{{ route('admin.ceo.index') }}" class="ms-1">Reset</a>
              @else
                Belum ada data CEO.
              @endif
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $ceos->links() }}
  </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content" style="overflow-y:auto">
      <form action="{{ route('admin.ceo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah CEO</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control summernote"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar</label>
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
