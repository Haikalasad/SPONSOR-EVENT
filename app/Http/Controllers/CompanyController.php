<?php

namespace App\Http\Controllers;

use App\Models\formSponsor;
use Illuminate\Http\Request;
use App\Models\Perusahaan;


class CompanyController extends Controller
{
    // Menampilkan Perushaan terbaru dan semua Perushaan
    public function index()
    {
        $PopularPerusahaans = Perusahaan::orderBy('created_at', 'asc')->take(4)->get();

        $Perusahaan = Perusahaan::all();

        return view('company', ['PopularPerusahaans' => $PopularPerusahaans, 'Perusahaan' => $Perusahaan]);
    }

    // fungsi untuk upload Perushaan ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_perusahaan' => 'required',
            'email' => 'required',
            'contact_person' => 'required',
            'deskripsi_perusahaan' => 'required',
            'syarat_ketentuan' => 'required',
            'gambar_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'alamat_perusahaan' => 'required',
        ]);

        $gambar_perusahaan = $this->uploadFile($request, 'gambar_perusahaan', 'gambar_perusahaan');

        $Perusahaan = Perusahaan::create([
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'email' => $request->input('email'),
            'contact_person' => $request->input('contact_person'),
            'deskripsi_perusahaan' => $request->input('deskripsi_perusahaan'),
            'syarat_ketentuan' => $request->input('syarat_ketentuan'),
            'gambar_perusahaan' => $gambar_perusahaan,
            'alamat_perusahaan' => $request->input('alamat_perusahaan'),
        ]);

        return redirect('company')->with('success', 'Perushaan berhasil dibuat.');
    }

    public function searchPerusahaan(Request $request)
    {
        $search = $request->input('search');
        $searchResults = Perusahaan::where('nama_perusahaan', 'LIKE', "%{$search}%")->get();

        return view('partials.search_result_company', compact('searchResults'));
    }

    public function showDetail(Request $request)
    {
        
        $PerusahaanID = $request->id;
        $detail = Perusahaan::find($PerusahaanID);

        if (!$detail) {
            return redirect()->route('showPerushaan')->with('error', 'Perushaan not found.');
        }

        return view('detailCompany', ['detail' => $detail]);
    }
    public function showFormSponsor($id)
    {
        $Perusahaan = Perusahaan::findOrFail($id);
        return view('uploadSponsor', ['Perusahaan' => $Perusahaan]);

    }
    

    public function storeSponsor(Request $request)
    {
        $userId = auth()->id(); 
        $PerusahaanID = $request->id_perusahaan;
    
        $request->validate([
            'id_user' => 'required',
            'id_perusahaan' => 'required',
            'nama_acara' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'nama_penerima' => 'required',
            'nominal' => 'required',
            'rekening' => 'required',
            'proposal_kegiatan' => 'mimes:pdf,doc,docx',
            'surat_pengantar' => 'mimes:pdf,doc,docx',
            'proposal_sponsor' => 'mimes:pdf,doc,docx'
        ]);
    
        // Proses unggahan file dan simpan path-nya
        
        $proposal_kegiatan = $this->uploadFile($request, 'proposal_kegiatan', 'documents');
        $surat_pengantar = $this->uploadFile($request, 'surat_pengantar', 'documents');
        $proposal_sponsor = $this->uploadFile($request, 'proposal_sponsor', 'documents');
    
        // Simpan data ke dalam database
        $sponsor = formSponsor::create([
            'id_user' => $userId,
            'id_perusahaan' => $PerusahaanID,
            'nama_acara' => $request->input('nama_acara'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_berakhir' => $request->input('tanggal_berakhir'),
            'nama_penerima' => $request->input('nama_penerima'),
            'nominal' => $request->input('nominal'),
            'rekening' => $request->input('rekening'),
            'proposal_kegiatan' => $proposal_kegiatan,
            'surat_pengantar' => $surat_pengantar,
            'proposal_sponsor' => $proposal_sponsor,
            'status_approval' => 1,
            'status_transfer' => 1, 
        ]);
    
        return redirect('company')->with('success', 'Pengajuan sponsor berhasil disimpan.');
    }
    
    private function uploadFile(Request $request, $key, $directory)
    {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $file_name = $file->getClientOriginalName();
            return $file->storeAs($directory, $file_name, 'public');
        }
        return null;
    }
    
}
