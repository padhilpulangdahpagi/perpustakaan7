<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'kode_buku', 'judul', 'kategori_id', 'pengarang', 
        'penerbit', 'tahun_terbit', 'isbn', 'harga', 
        'stok', 'deskripsi', 'bahasa'
    ];

    // ==========================================
    // ACCESSORS (A)
    // ==========================================

    // Accessor status_stok_badge
    public function getStatusStokBadgeAttribute(): string
    {
        if ($this->stok == 0) {
            return '<span class="badge bg-danger">Habis</span>';
        } elseif ($this->stok >= 1 && $this->stok <= 5) {
            return '<span class="badge bg-warning">Menipis</span>';
        } elseif ($this->stok >= 6 && $this->stok <= 15) {
            return '<span class="badge bg-info">Sedang</span>';
        } else {
            return '<span class="badge bg-success">Aman</span>';
        }
    }

    // Accessor tahun_label
    public function getTahunLabelAttribute(): string
    {
        if ($this->tahun_terbit >= 2024) {
            return 'Buku Baru';
        } else {
            return 'Buku Lama';
        }
    }

    // ==========================================
    // SCOPES (A)
    // ==========================================

    // Scope stokMenipis()
    public function scopeStokMenipis($query)
    {
        return $query->where('stok', '<', 5);
    }

    // Scope hargaRange($min, $max)
    public function scopeHargaRange($query, $min, $max)
    {
        return $query->whereBetween('harga', [$min, $max]);
    }

    // Scope terbaru()
    public function scopeTerbaru($query)
    {
        return $query->where('tahun_terbit', '>=', 2024);
    }
}