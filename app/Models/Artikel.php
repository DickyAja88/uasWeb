<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasMany(User::class, 'id_user');
    }
    public function topiks(){
        return $this->hasMany(Topik::class, 'id_topik');
    }
    
    protected $fillable = [
        'judul',
        'gambar',
        'konten',
        'tanggal',
        'id_topik',
        'id_user',
    ];


    protected $primaryKey ='id_artikel';
}
