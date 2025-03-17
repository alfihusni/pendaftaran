<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran PDF</title>
</head>
<body>
    <h1>Data Pendaftaran</h1>
    <p>Nama: {{ $pendaftaran->nama }}</p>
    <p>Tanggal Lahir: {{ $pendaftaran->tanggal_lahir }}</p>
    <p>Jenis Kelamin: {{ $pendaftaran->jenis_kelamin }}</p>
    <p>Agama: {{ $pendaftaran->agama }}</p>
    <p>NIK: {{ $pendaftaran->NIK }}</p>
    <p>Alamat: {{ $pendaftaran->alamat }}</p>
    <p>Hobi: {{ implode(', ', $pendaftaran->hobi ?? []) }}</p>
    @if($pendaftaran->foto)
        <img src="{{ public_path('storage/' . $pendaftaran->foto) }}" alt="Foto" width="100">
    @endif
</body>
</html>