@extends('layouts.indexAdmin')

@section('content')
<div class="container">
    <h4 class="mb-3">Manajemen Lamaran</h4>

    <!-- Form Pencarian & Urutkan -->
<div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <!-- Form search & sort di sebelah kanan -->
    <form method="GET" action="{{ route('admin.lamaran.index') }}" class="d-flex align-items-center gap-2 ms-auto">
        <input type="search"
               name="q"
               class="form-control"
               placeholder="Cari lamaran…"
               value="{{ $q ?? request('q') }}"
               style="min-width:220px">

        <select name="sort" class="form-select">
            <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Terbaru</option>
            <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Terlama</option>
        </select>

        @if(($q ?? request('q')) !== '' || request('sort') !== 'desc')
            <a href="{{ route('admin.lamaran.index') }}" class="btn btn-outline-secondary">Reset</a>
        @endif

        <button type="submit" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-search me-2"></i> Cari
        </button>
    </form>
</div>


    {{-- Ringkasan --}}
    @if(method_exists($applications, 'total'))
        <div class="mb-2 small text-muted">
            Total: {{ $applications->total() }}
            @if(($q ?? '') !== '')
                • Kata kunci: "<b>{{ $q }}</b>"
            @endif
        </div>
    @endif

    <!-- Tabel Lamaran -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                <tr>
                    <td>{{ $loop->iteration + ($applications->currentPage()-1) * $applications->perPage() }}</td>
                    <td>{{ $app->full_name }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->phone_number }}</td>
                    <td>{{ $app->created_at->format('d M Y H:i') }}</td>
                    <td style="width: 170px;">
                        <!-- Tombol Detail -->
                        <button class="btn btn-sm btn-info mb-1" data-bs-toggle="modal" data-bs-target="#detailLamaran{{ $app->id }}">
                            Detail
                        </button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.lamaran.destroy', $app->id) }}" method="POST" style="display:inline" class="delete-form">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-name="{{ $app->full_name }}">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Detail Lamaran -->
<!-- Modal Detail Lamaran -->
<div class="modal fade" id="detailLamaran{{ $app->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form>
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Detail Lamaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" value="{{ $app->full_name }}" readonly>
          </div>
          <div class="mb-3">
              <label>Email</label>
              <input type="text" class="form-control" value="{{ $app->email }}" readonly>
          </div>
          <div class="mb-3">
              <label>Nomor HP</label>
              <input type="text" class="form-control" value="{{ $app->phone_number }}" readonly>
          </div>
          <div class="mb-3">
              <label>Pesan</label>
              <textarea class="form-control" rows="4" readonly>{{ $app->message ?? '-' }}</textarea>
          </div>
          <div class="mb-3">
              <label>CV</label><br>
              @if($app->cv_path)
                  <a href="{{ asset('storage/' . $app->cv_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                      Lihat / Unduh CV
                  </a>
              @else
                  <input type="text" class="form-control" value="Tidak ada" readonly>
              @endif
          </div>
          <div class="mb-3">
              <label>Dikirim</label>
              <input type="text" class="form-control" value="{{ $app->created_at->format('d M Y H:i') }}" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>

                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada lamaran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($applications, 'links'))
        <div class="mt-3">
            {{ $applications->links() }}
        </div>
    @endif
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
        const name = this.dataset.name || 'lamaran ini';
        Swal.fire({
          title: 'Yakin ingin menghapus?',
          html: `Anda akan menghapus lamaran dari <b>${name}</b>.<br> Tindakan ini tidak bisa dibatalkan!`,
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
