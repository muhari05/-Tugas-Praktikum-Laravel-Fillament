<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Dosen;

class Laporan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.laporan';

    public $dosenData;

    public function mount()
    {
        // Ambil data dosen dan simpan ke variabel $dosenData
        $this->dosenData = Dosen::all();
    }
}
