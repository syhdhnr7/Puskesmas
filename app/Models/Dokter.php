<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    public static function getAll(){
        return[
            [
                "nama" => 'Roger',
                "jk" => 'L',
                "tgl_lahir" => '01/01/1973',
                "alamat" => 'Bogor',
                "telp" => '08123456789'
            ],
            [
                "nama" => 'Rouge',
                "jk" => 'P',
                "tgl_lahir" => '03/07/1980',
                "alamat" => 'Jakarta',
                "telp" => '08123456789'
            ],
            [
                "nama" => 'Rayleigh',
                "jk" => 'L',
                "tgl_lahir" => '23/02/1973',
                "alamat" => 'Depok',
                "telp" => '08123456789'
            ],
        ];
    }
}
