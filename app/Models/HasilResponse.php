<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilResponse extends Model
{
    use HasFactory;

    protected $table = 'hasil_responses';

    protected $fillable = [
        'nama',
        'jk_kode',
        'profesi_kode',
        'alamat',
        'email',
        'angka_kurang',
        'angka_lebih',
    ];

    protected $casts = [

        'plain_json' => 'array',

    ];

    public function json(): Attribute {

        return new Attribute(get: function ($value ,$attribute){
            $json = preg_replace('/[0-9]/','',$this->plain_json);

            return $json;


        }

    );


    }


        public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'jk_kode', 'kode');
    }

    public function profesi()
    {
        return $this->belongsTo(Profesi::class, 'profesi_kode', 'kode');
    }

}
