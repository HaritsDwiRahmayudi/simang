<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'tanggal', 
        'nama_koordinator', 
        'lokasi', 
        'kegiatan', 
        'ttd_koordinator', 
        'foto_kegiatan' // <-- Pastikan ini ada
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}