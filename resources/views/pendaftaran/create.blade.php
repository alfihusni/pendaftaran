@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Tambah pendaftaran</h1>
<form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="number" name="NIK" placeholder="NIK"><br>
    <input type="text" name="nama" placeholder="Nama"><br>
    <input type= "text" name="tempat_lahir" placeholder="tempat lahir"><br>
    <input type="date" name="tanggal_lahir"><br>
    <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki
    <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan<br>
    <select name="agama">
    <option value="">Pilih Agama</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Buddha">Buddha</option>
    <option value="Konghucu">Konghucu</option>
</select><br>

    <textarea name="alamat" placeholder="Alamat"></textarea><br>
    <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
    <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga<br>
    <input type="file" name="foto"><br>
    <button type="submit">Simpan</button>
</form>

