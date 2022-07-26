<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    public function pemeriksaans(){
        return $this->belongTo(Pemeriksaan::class);
    }
}
