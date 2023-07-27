@extends('layout.app')
@section('title', 'Daftar Divisi')
@section('content')
    <h2>Daftar Divisi</h2>
    <a href="divisi/create">
        <button type="button" class="btn btn-primary m-1">Tambah</button>
    </a>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Divisi</th>
            <th>Keterangan</th>
            <th colspan="2">Aksi</th>
        </tr>
        @foreach ($divisi as $dv)
            <tr>
                <td>{{ $dv->id }}</td>
                <td>{{ $dv->nama }}</td>
                <td>{{ $dv->keterangan }}</td>
                <td><a href="divisi/{{ $dv->id }}/edit">Edit</a></td>
                <td><a href="divisi/{{ $dv->id }}">Hapus</a></td>
            </tr>
        @endforeach
    </table>
@endsection
