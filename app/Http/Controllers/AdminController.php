<?php

namespace App\Http\Controllers;

use App\Models\formSponsor;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
 
    public function index()
    {
        $sponsorshipForms = FormSponsor::all();
        
        return view('admin.adminHome', compact('sponsorshipForms'));
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
    
    public function updateStatusApproval(Request $request)
    {
        $formSponsorId = $request->input('formSponsorId');
        $statusApprovalId = $request->input('statusApprovalId');
    
        // Perbarui status_approval di database
        $formSponsor = FormSponsor::find($formSponsorId);
        $formSponsor->status_approval = $statusApprovalId;
        $formSponsor->save();
    
        return response()->json(['message' => 'Status approval berhasil diperbarui.']);
    }
    
    public function updateStatusTransfer(Request $request)
    {
        $formSponsorId = $request->input('formSponsorId');
        $statusTransferId = $request->input('statusTransferId');
    
        // Perbarui status_transfer di database
        $formSponsor = FormSponsor::find($formSponsorId);
        $formSponsor->status_transfer = $statusTransferId;
        $formSponsor->save();
    
        return response()->json(['message' => 'Status transfer berhasil diperbarui.']);
    }

    
    
    private function uploadFile(Request $request, $key, $directory)
    {
        if ($request->hasFile($key)) {
            return $request->file($key)->store($directory, 'public');
        }
        return null;
    }
    public function downloadProposalSponsor($file_name)
    {
        $file_path = storage_path('app/public/documents/' . $file_name);

        if (file_exists($file_path)) {
            return response()->download($file_path, $file_name, [
                'Content-Type' => mime_content_type($file_path),
            ]);
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }

    public function downloadProposalKegiatan($file_name)
    {
        $file_path = storage_path('app/public/documents/' . $file_name);

        if (file_exists($file_path)) {
            return response()->download($file_path, $file_name, [
                'Content-Type' => mime_content_type($file_path),
            ]);
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }

    public function downloadSuratPengantar($file_name)
    {
        $file_path = storage_path('app/public/documents/' . $file_name);

        if (file_exists($file_path)) {
            return response()->download($file_path, $file_name, [
                'Content-Type' => mime_content_type($file_path),
            ]);
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }
    
    
}
