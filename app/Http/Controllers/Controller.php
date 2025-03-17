<?php
namespace App\Http\Controllers;

use App\Models\pendaftaran;
use App\Http\Requests\PendaftaranRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage
use Barryvdh\DomPDF\Facade\Pdf;

class Controller #extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(PendaftaranRequest $request)
    {
        $request->merge(['hobi' => json_encode($request->hobi)]);
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('photos', 'public');
            $request->merge(['foto' => $path]);

        pendaftaran::create($request->all());
        #return response()->json($pendaftaran, 201);
        return redirect()->route('pendaftaran.index');
    }
}

    public function edit(pendaftaran $pendaftaran)
    {
        $pendaftaran->hobi = json_decode($pendaftaran->hobi);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(PendaftaranRequest $request, pendaftaran $pendaftaran)
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
        #return redirect()->route('pendaftaran.index');
    }

    public function destroy(pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index');
    }
    public function downloadPdf(Pendaftaran $pendaftaran)
    {
        $pendaftaran->hobi = json_decode($pendaftaran->hobi);
        $pdf = Pdf::loadView('pendaftaran.pdf', compact('pendaftaran'));

        return $pdf->download('pendaftaran_' . $pendaftaran->id . '.pdf');
    }
}