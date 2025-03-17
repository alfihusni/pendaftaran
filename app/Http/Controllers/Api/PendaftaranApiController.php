<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Http\Requests\PendaftaranRequest; // Import Form Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage

class PendaftaranApiController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return response()->json($pendaftarans);
    }

    public function store(PendaftaranRequest $request)
    {
        $request->merge(['hobi' => json_encode($request->hobi)]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('photos', 'public');
            $request->merge(['foto' => $path]);
        }
        $pendaftaran = Pendaftaran::create($request->all());

        return response()->json($pendaftaran, 201);
    }

    public function show(Pendaftaran $pendaftaran)
    {
        $pendaftaran->hobi = json_decode($pendaftaran->hobi);
        return response()->json($pendaftaran);
    }

    public function update(PendaftaranRequest $request, Pendaftaran $pendaftaran)
    {
        $request->merge(['hobi' => json_encode($request->hobi)]);

        if ($request->hasFile('foto')) {
            if($pendaftaran->foto){
                Storage::disk('public')->delete($pendaftaran->foto);
            }
            $path = $request->file('foto')->store('photos', 'public');
            $request->merge(['foto' => $path]);
        }

        $pendaftaran->update($request->all());
        return response()->json($pendaftaran);
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return response()->json(null, 204);
    }
}