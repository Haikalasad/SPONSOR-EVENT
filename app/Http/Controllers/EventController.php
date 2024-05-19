<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    // Menampilkan event terbaru dan semua event
    public function index()
    {
        $newEvents = Event::orderBy('created_at', 'desc')->take(4)->get();
        
        $events = Event::all();
    
        return view('event', ['newEvents' => $newEvents, 'events' => $events]);
    }

    // fungsi untuk upload event ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_acara' => 'required',
            'penyelenggara' => 'required',
            'waktu_pelaksanaan' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'syarat_ketentuan' => 'required',
            'gambar_acara' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp', 
            'kategori_acara' => 'required|exists:kategori,id',
        ]);

        if ($request->hasFile('gambar_acara')) {
            $imageName = $request->file('gambar_acara')->store('gambar_acara', 'public');
        } else {
            $imageName = null;
        }

        // Buat event baru
        $event = Event::create([
            'nama_acara' => $request->input('nama_acara'),
            'penyelenggara' => $request->input('penyelenggara'),
            'waktu_pelaksanaan' => $request->input('waktu_pelaksanaan'),
            'lokasi' => $request->input('lokasi'),
            'deskripsi' => $request->input('deskripsi'),
            'syarat_ketentuan' => $request->input('syarat_ketentuan'),
            'gambar_acara' => $imageName,
            'id_user' => auth()->id(),
            'id_kategori' => $request->input('kategori_acara'), 
        ]);

        return redirect()->back()->with('message', 'Event successfully uploaded!');
    }
    public function editEvent($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect()->route('showEvent')->with('error', 'Event not found.');
        }

        return view('editEvent', ['event' => $event]);
    }

    public function updateEvent(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_acara' => 'required',
            'penyelenggara' => 'required',
            'waktu_pelaksanaan' => 'required|date',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'syarat_ketentuan' => 'required',
            'gambar_acara' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp', 
            'kategori_acara' => 'required|exists:kategori,id',
        ]);

        $event = Event::find($id);

        if (!$event) {
            return redirect()->route('showEvent')->with('error', 'Event not found.');
        }

        if ($request->hasFile('gambar_acara')) {
            $imageName = $request->file('gambar_acara')->store('gambar_acara', 'public');
        } else {
            $imageName = $event->gambar_acara;
        }

        // Update event
        $event->update([
            'nama_acara' => $request->input('nama_acara'),
            'penyelenggara' => $request->input('penyelenggara'),
            'waktu_pelaksanaan' => $request->input('waktu_pelaksanaan'),
            'lokasi' => $request->input('lokasi'),
            'deskripsi' => $request->input('deskripsi'),
            'syarat_ketentuan' => $request->input('syarat_ketentuan'),
            'gambar_acara' => $imageName,
            'id_kategori' => $request->input('kategori_acara'), 
        ]);

        return redirect('/event')->with('success', 'Event berhasil diperbarui.');
    }

    public function searchEvent(Request $request)
    {
        $search = $request->input('search');
        $searchResults = Event::where('nama_acara', 'LIKE', "%{$search}%")->get();
    
        return view('partials.search_results', compact('searchResults'));
    }

    public function showDetail(Request $request){
        $eventID = $request->id;
        $detail = Event::find($eventID);
       
            $detail->time_ago = Carbon::parse($detail->created_at)->diffForHumans();
        
        if(!$detail) {
            return redirect()->route('showEvent')->with('error', 'Event not found.');
        }
    
        // Kirim data detail event ke tampilan
        return view('detailEvent', ['detail' => $detail]);
    }
    
}
