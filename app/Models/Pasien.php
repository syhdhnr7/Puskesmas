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
                "nama" => 'Ace',
                "jk" => 'L',
                "tgl_lahir" => '01/01/2002',
                "alamat" => 'Bogor',
                "telp" => '08123456789'
            ],
            [
                "nama" => 'Miora',
                "jk" => 'P',
                "tgl_lahir" => '03/07/2003',
                "alamat" => 'Jakarta',
                "telp" => '08123456789'
            ],
            [
                "nama" => 'Sabo',
                "jk" => 'L',
                "tgl_lahir" => '23/02/2002',
                "alamat" => 'Depok',
                "telp" => '08123456789'
            ],
        ];
    }
}
