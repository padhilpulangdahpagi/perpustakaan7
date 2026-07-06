<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class KodeBukuFormat implements Rule
{
    public function passes($attribute, $value)
    {
        // Validasi format reguler harus sesuai BK-XXX-000 (Contoh: BK-PROG-001)
        return preg_match('/^BK-[A-Z]{2,4}-\d{3}$/', $value);
    }

    public function message()
    {
        return 'Format kode buku harus: BK-[KATEGORI SINGKAT]-[NOMOR] (contoh: BK-PROG-001)';
    }
}