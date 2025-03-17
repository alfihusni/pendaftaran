<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Atau logika otorisasi Anda
    }

    public function rules()
    {
        return [
            'NIK' => 'required|numeric|digits:16', // Validasi NIK
            'nama' => ['required', 'string', 'max:255', 'regex:/^[A-Z\s]+$/'],
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'nullable|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'hobi' => 'nullable|array',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'NIK.numeric' => 'NIK harus berupa angka.',
            'NIK.digits' => 'NIK harus terdiri dari 16 digit.',
            'nama.regex' => 'Nama harus terdiri dari huruf kapital dan spasi saja.',
            'agama.in' => 'Agama yang dipilih tidak valid.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
