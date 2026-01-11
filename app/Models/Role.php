<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Tambahkan baris ini agar 'nama_role' bisa diisi
    protected $fillable = ['nama_role'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}