@extends('layout.app')
@section('title', 'Daftar Divisi')
@section('content')
    @if ($status == 'edit')
        <h2>Ubah Data Divisi</h2>
    @else
        <h2>Input Data Divisi</h2>
    @endif
    <form name="main_form" action="{{ $action }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $divisi->id }}" />
        @if ($status == 'edit')
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="exampleInputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp"
                value="{{ $divisi->nama }}">
            <div id="emailHelp" class="form-text">
                @error('nama')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputKeterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan">{{ $divisi->keterangan }}</textarea>
            <div id="emailHelp" class="form-text">
                @error('keterangan')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            @if ($status == 'edit')
                Edit
            @else
                Simpan
            @endif
        </button>
        <a href="/divisi">
            <button type="button" class="btn btn-danger m-1">Batal</button>
        </a>
    </form>
@endsection
