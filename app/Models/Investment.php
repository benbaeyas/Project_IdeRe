<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'jumlah_investasi',
        'tanggal_investasi',
    ];

    // ✅ Relasi ke project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // ✅ Relasi ke user/investor (jika diperlukan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
