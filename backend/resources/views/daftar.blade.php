<h2>Daftar Informasi</h2>
Kode: {{ $kode }} <br>
Lokasi: {{ $lokasi }} <br>

<h3>Daftar Divisi</h3>
@foreach ($divisi as $dv)
ID: {{$dv->id}} <br>
Nama:{{$dv->nama}} <br>
<br>    
@endforeach
