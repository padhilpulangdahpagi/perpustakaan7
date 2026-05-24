<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'nomor_anggota', 'nama', 'jenis_kelamin', 
        'tanggal_lahir', 'telepon', 'alamat', 'status_aktif'
    ];

    // ==========================================
    // ACCESSORS (B)
    // ==========================================

    // Accessor status_badge
    public function getStatusBadgeAttribute(): string
    {
        if ($this->status_aktif == 1 || $this->status_aktif == 'Aktif') {
            return '<span class="badge bg-success">Aktif</span>';
        } else {
            return '<span class="badge bg-secondary">Nonaktif</span>';
        }
    }

    // Accessor kategori_usia (Menghitung umur berdasarkan tanggal_lahir)
    public function getKategoriUsiaAttribute(): string
    {
        $umur = Carbon::parse($this->tanggal_lahir)->age;

        if ($umur < 20) {
            return 'Remaja';
        } elseif ($umur >= 20 && $umur <= 50) {
            return 'Dewasa';
        } else {
            return 'Senior';
        }
    }

    // ==========================================
    // SCOPES (B)
    // ==========================================

    // Scope jenisKelamin($jk)
    public function scopeJenisKelamin($query, $jk)
    {
        return $query->where('jenis_kelamin', $jk);
    }

    // Scope terdaftarBulanIni()
    public function scopeTerdaftarBulanIni($query)
    {
        return $query->whereMonth('created_at', Carbon::now()->month)
                     ->whereYear('created_at', Carbon::now()->year);
    }
}