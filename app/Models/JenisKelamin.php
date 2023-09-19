<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamins';

    protected $fillable = [
        'kode',
        'jenis_kelamin',
    ];

    public function hasilResponse()
    {
        return $this->hasMany(HasilResponse::class, 'jk_kode', 'kode');
    }
    
}
