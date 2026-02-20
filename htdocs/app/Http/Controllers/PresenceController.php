<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\Magang;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PresenceController extends Controller
{
    // Halaman Absensi
    public function index()
    {
        $userId = Auth::id();
        // Pakai timezone Asia/Jakarta biar gak selisih hari kalau servernya di luar negeri
        $today = Carbon::now('Asia/Jakarta')->toDateString(); 

        // 1. Cek Data Magang
        $magang = Magang::where('user_id', $userId)->first();
        
        // Kalau belum daftar atau belum diapprove, tendang ke dashboard
        if (!$magang || $magang->status != 'approved') {
            return redirect()->route('dashboard')->with('error', 'Akun magang belum disetujui atau belum terdaftar.');
        }

        // 2. Cek apakah hari ini sudah absen?
        $presenceToday = Presence::where('user_id', $userId)
                                ->where('tanggal', $today)
                                ->first();

        // 3. Ambil riwayat absen (limit 31 hari terakhir biar gak berat)
        $history = Presence::where('user_id', $userId)
                            ->orderBy('tanggal', 'desc')
                            ->limit(31) 
                            ->get();

        return view('presence.index', compact('presenceToday', 'history'));
    }

    // Proses Absen Masuk
    public function checkIn()
    {
        $userId = Auth::id();
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $jamSekarang = Carbon::now('Asia/Jakarta')->toTimeString();

        // Cek double input (jaga-jaga kalau user ngeklik 2x)
        if (Presence::where('user_id', $userId)->where('tanggal', $today)->exists()) {
            return redirect()->back()->with('error', 'Anda sudah absen masuk hari ini.');
        }

        Presence::create([
            'user_id' => $userId,
            'tanggal' => $today,
            'jam_masuk' => $jamSekarang,
            'status' => 'hadir' // SAYA UBAH JADI HURUF KECIL BIAR AMAN
        ]);

        return redirect()->back()->with('success', 'Berhasil Absen Masuk! Semangat magangnya.');
    }

    // Proses Absen Pulang
    public function checkOut()
    {
        $userId = Auth::id();
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $jamSekarang = Carbon::now('Asia/Jakarta')->toTimeString();

        $presence = Presence::where('user_id', $userId)->where('tanggal', $today)->first();

        if (!$presence) {
            return redirect()->back()->with('error', 'Anda belum melakukan absen masuk hari ini!');
        }
        
        // Kalau sudah absen pulang, jangan update lagi
        if ($presence->jam_keluar) {
             return redirect()->back()->with('error', 'Anda sudah absen pulang sebelumnya.');
        }

        $presence->update([
            'jam_keluar' => $jamSekarang
        ]);

        return redirect()->back()->with('success', 'Berhasil Absen Pulang. Hati-hati di jalan!');
    }
}