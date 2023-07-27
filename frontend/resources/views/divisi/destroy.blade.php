@extends('layout.app')
@section('title', 'Daftar Divisi')
@section('content')
    <h3>Apakah Anda akan menghapus data ini?</h3>
    <div class="mb-3">
        <label for="exampleInputNama" class="form-label">Nama</label>: {{ $divisi->nama }}<br>
        <label for="exampleInputKeterangan" class="form-label">Keterangan:</label>
        <p>{{ $divisi->keterangan }}</p>
    </div>
    <form name="main_form" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger m-1">Hapus</button>
        <a href="{{ url('/divisi') }}">
            <button type="button" class="btn btn-warning m-1">Batal</button>
        </a>
    </form>
@endsection
