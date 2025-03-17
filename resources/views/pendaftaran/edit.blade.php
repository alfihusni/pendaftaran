@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Edit pendaftaran</h1>
<form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="number" name="NIK" value="{{ $pendaftaran->NIK }}"><br>
    <input type="text" name="nama" value="{{ $pendaftaran->nama }}"><br>
    <input type="text" name="tempat_lahir" value="{{ $pendaftaran->tempat_lahir }}"><br>
    <input type="date" name="tanggal_lahir" value="{{ $pendaftaran->tanggal_lahir }}"><br>
    <input type="radio" name="jenis_kelamin" value="laki-laki" {{ $pendaftaran->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}> Laki-laki
    <select name="agama">
    <option value="">Pilih Agama</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option>
    <option value="Konghucu">Konghucu</option>
</select><br>

<select name="agama">
    <option value="">Pilih Agama</option>
    <option value="Islam" {{ $pendaftaran->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
    <option value="Kristen" {{ $pendaftaran->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
    <option value="Katolik" {{ $pendaftaran->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
    <option value="Hindu" {{ $pendaftaran->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
    <option value="Buddha" {{ $pendaftaran->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
    <option value="Konghucu" {{ $pendaftaran->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
</select><br>

    <input type="radio" name="jenis_kelamin" value="perempuan" {{ $pendaftaran->jenis_kelamin == 'perempuan' ? 'checked' : '' }}> Perempuan<br>    <textarea name="alamat">{{ $pendaftaran->alamat }}</textarea><br>
    <input type="checkbox" name="hobi[]" value="Membaca" {{ in_array('Membaca', $pendaftaran->hobi ?? []) ? 'checked' : '' }}> Membaca
    <input type="checkbox" name="hobi[]" value="Olahraga" {{ in_array('Olahraga', $pendaftaran->hobi ?? []) ? 'checked' : '' }}> Olahraga<br>
    <input type="file" name="foto"><br>
@if($pendaftaran->foto)
    <img src="{{ asset('storage/' . $pendaftaran->foto) }}" alt="Foto" width="100"><br>
@endif
    <button type="submit">Update</button>
</form>