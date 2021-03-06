<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\KunjunganSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

use App\Exports\KunjunganSiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KunjunganSiswaController extends Controller
{
    //
    public function index() {
        $kunjungan = \App\KunjunganSiswa::all();
        return view('Kunjungan/kunjungansiswa', ['kunjungan' => $kunjungan]);
    }

    public function proses_cari(Request $request){
        $cari =  Siswa::where('NIS', $request->NIS)->first()->id ?? 0;
        if ($cari==0) {
            alert()->error('Error','NIS tidak ditemukan');
            return redirect('/formsiswa');
        }
        else{ 
        \App\KunjunganSiswa::create([
            'ksiswa_id' => $cari,
        ]);
        alert()->success('Sukses','Data Kunjungan berhasil ditambahkan!');
        return redirect('/formsiswa');    
        }

    }

    public function deleteall(){
        \App\KunjunganSiswa::truncate();
        alert()->success('Sukses','Seluruh data berhasil dihapus!');       
        return redirect('/kunjungansiswa');

    }

    public function export_excel()
	{
        return Excel::download(new KunjunganSiswaExport, 'KunjunganSiswa.xlsx');
	}
}
