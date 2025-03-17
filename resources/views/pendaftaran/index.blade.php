<h1>Daftar Pendaftaran</h1>
<a href="{{ route('pendaftaran.create') }}">Tambah Pendaftaran</a>
<table>
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>

            <th> Tempat lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Foto</th>
            <th>Hobi</th>
            
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendaftarans as $pendaftaran)
            <tr>
                <td>{{ $pendaftaran->NIK }}</td>
                <td>{{ $pendaftaran->nama }}</td>
                <td>{{ $pendaftaran->tempat_lahir }}</td>
                <td>{{ $pendaftaran->tanggal_lahir }}</td>
                <td>{{ $pendaftaran->jenis_kelamin }}</td>
                <td>{{ $pendaftaran->agama }}</td>
                <td>
                    @if($pendaftaran->foto)
                        <img src="{{ asset('storage/' . $pendaftaran->foto) }}" alt="Foto" width="50">
                    @endif
                </td>
                <td>{{ implode(', ', json_decode($pendaftaran->hobi) ?? []) }}</td>
                <td>
                    <a href="{{ route('pendaftaran.edit', $pendaftaran->id) }}">Edit</a>
                    <a href="{{ route('pendaftaran.download', $pendaftaran->id) }}">Download PDF</a>
                    <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>