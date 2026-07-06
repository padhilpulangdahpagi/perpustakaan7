<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Buku;

class BukuCard extends Component
{
    public $buku;

    public function __construct(Buku $buku)
    {
        $this->buku = $buku;
    }

    public function render()
    {
        return view('components.buku-card');
    }
}