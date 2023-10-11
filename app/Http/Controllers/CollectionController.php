<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    // Menampilkan daftar koleksi
    public function index()
    {
        $collections = Collection::all();
        return view('koleksi.daftarKoleksi', compact('collections'));
    }

    // Menampilkan formulir registrasi koleksi
    public function create()
    {
        return view('koleksi.registrasi');
    }

    // Menyimpan data registrasi koleksi
    public function store(Request $request)
    {
        $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:100'],
            'jenisKoleksi' => ['required', 'numeric', 'in:1,2,3'],
            'jumlahKoleksi' => ['required', 'integer']
        ]);

        DB::beginTransaction();

        try {

            Collection::create([
                'namaKoleksi' => $request->namaKoleksi,
                'jenisKoleksi' => $request->jenisKoleksi,
                'jumlahKoleksi' => $request->jumlahKoleksi
            ]);

            DB::commit();

            return redirect()->route("koleksi.daftarKoleksi")->with("success", "Added collection successfully");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route("koleksi.daftarKoleksi")->with("error", "Added collection failed");
        }
    }

    // Menampilkan informasi koleksi
    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
    }
}
