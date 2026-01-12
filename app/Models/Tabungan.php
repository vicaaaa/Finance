<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nominal', 'keterangan'];

    // Kode fungsi ini HARUS di dalam class agar terbaca oleh Laravel
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}