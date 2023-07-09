<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    //menghubungkan model dengan tabel pasiens
    protected $table = 'pasiens';

    //
    protected $fillable = ['nama', 'jk', 'tgl_lahir', 'alamat', 'telp', 'dokter_id'];

    public function dokter(){
        return $this->belongsTo(Dokter::class);
    }
}
