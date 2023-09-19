<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    protected $table = 'profesis';

    protected $fillable = [
        'kode',
        'profesi',
    ];

    public function hasilResponse()
    {
        return $this->hasMany(HasilResponse::class, 'profesi_kode', 'kode');
    }
    
}
