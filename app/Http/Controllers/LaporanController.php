<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Makul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman laporan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Ambil semua data dari database
            $dosenData = Dosen::all();
            $makulData = Makul::all();
            $mahasiswaData = Mahasiswa::all();

            // Kirim data ke view
            return view('filament.pages.laporan', compact('dosenData', 'makulData', 'mahasiswaData'));
        } catch (\Exception $e) {
            // Tangani error dan tampilkan pesan
            return response()->view('errors.custom', ['message' => $e->getMessage()], 500);
        }
    }
}
