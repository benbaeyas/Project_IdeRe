<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\User;
class Project extends Model
{
    use HasFactory;
//08 menambahkan berikut
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto_proyek',
        'target_dana',
        'tanggal_mulai',
        'tanggal_berakhir',
        'category_id',
        'user_id', // jika kamu juga menyimpan ID user yang login
    ];
    // Tetap pakai nama method `category`, tapi arahkan ke model `Categories`
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
}