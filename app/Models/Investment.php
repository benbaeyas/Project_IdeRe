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
        // tambahkan field lain jika ada
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        protected $casts = [
        'dana_terkumpul' => 'decimal:2',
        'target_dana' => 'decimal:2',
    ];
}
