@extends('layouts.indexAdmin')

@section('title','FAQ')

@section('content')
<div class="container">
  <h4 class="mb-3">Manajemen FAQ</h4>

  <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahFaq" {{ $categories->isEmpty() ? 'disabled' : '' }}>
      + Tambah FAQ
    </button>

    <form method="GET" action="{{ route('admin.faq.index') }}" class="d-flex align-items-center gap-2 w-full">
      <input type="search" name="q" class="form-control" placeholder="Cari pertanyaan/jawaban…"
             value="{{ $q ?? request('q') }}" style="min-width:220px">

      <select name="category" class="form-select" style="min-width:180px">
        <option value="">Semua Kategori</option>
        @foreach($categories as $cat)
          <option value="{{ $cat->id }}" {{ (string)($categoryId ?? '') === (string)$cat->id ? 'selected' : '' }}>
            {{ $cat->nama }}
          </option>
        @endforeach
      </select>

      <select name="sort_by" class="form-select">
        <option value="created_at" {{ ($sortBy ?? 'created_at') === 'created_at' ? 'selected' : '' }}>Urut: Dibuat</option>
        <option value="pertanyaan" {{ ($sortBy ?? '') === 'pertanyaan' ? 'selected' : '' }}>Urut: Pertanyaan</option>
      </select>

      <select name="sort" class="form-select">
        <option value="desc" {{ ($sort ?? 'desc') === 'desc' ? 'selected' : '' }}>Desc</option>
        <option value="asc"  {{ ($sort ?? '') === 'asc'  ? 'selected' : '' }}>Asc</option>
      </select>

      @if(($q ?? '') !== '' || ($categoryId ?? '') !== '' || ($sortBy ?? 'created_at') !== 'created_at' || ($sort ?? 'desc') !== 'desc')
        <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary">Reset</a>
      @endif

      <button type="submit" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-funnel me-2"></i> Terapkan
      </button>
    </form>
  </div>

  @if(method_exists($faqs, 'total'))
    <div class="mb-2 small text-muted">
      Total: {{ $faqs->total() }}
      @if(($q ?? '') !== '') • Keyword: "<b>{{ $q }}</b>" @endif
      @if(($categoryId ?? '') !== '') • Kategori: <b>#{{ $categoryId }}</b> @endif
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Pertanyaan</th>
          <th>Kategori</th>
          <th>Jawaban</th>
          <th style="width:180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($faqs as $f)
        <tr>
          <td class="fw-semibold">{{ $f->pertanyaan }}</td>
          <td>{{ $f->category->nama ?? '-' }}</td>
          <td class="small text-muted">{!! \Illuminate\Support\Str::limit(strip_tags($f->jawaban), 120) !!}</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditFaq{{ $f->id }}">Edit</button>
            <form action="{{ route('admin.faq.destroy', $f->id) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus FAQ ini?')">Hapus</button>
            </form>
          </td>
        </tr>

        {{-- Modal Edit --}}
        <div class="modal fade" id="modalEditFaq{{ $f->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content" style="overflow-y:auto">
              <form action="{{ route('admin.faq.update', $f->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit FAQ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="faq_category_id" class="form-select" required>
                      @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $f->faq_category_id == $cat->id ? 'selected' : '' }}>
                          {{ $cat->nama }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Pertanyaan</label>
                    <input type="text" name="pertanyaan" class="form-control" value="{{ $f->pertanyaan }}" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Jawaban</label>
                    <textarea name="jawaban" class="form-control summernote">{!! $f->jawaban !!}</textarea>
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
          <tr><td colspan="4" class="text-center text-muted">Belum ada FAQ.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">{{ $faqs->links() }}</div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modalTambahFaq" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content" style="overflow-y:auto">
      <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah FAQ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="faq_category_id" class="form-select" required>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ (string)($categoryId ?? '') === (string)$cat->id ? 'selected' : '' }}>
                  {{ $cat->nama }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Pertanyaan</label>
            <input type="text" name="pertanyaan" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Jawaban</label>
            <textarea name="jawaban" class="form-control summernote"></textarea>
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
@endsection
