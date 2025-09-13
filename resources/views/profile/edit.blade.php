@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Profil</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="avatar">Foto Profil</label>
            <input type="file" name="avatar" class="form-control">
            @if(auth()->user()->avatar)
                <img src="{{ asset('storage/'.auth()->user()->avatar) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
