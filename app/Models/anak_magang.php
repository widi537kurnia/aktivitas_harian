<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anak_magang extends Model
{
    use HasFactory;

    protected $table = 'anak_magang';

    protected $fillable = [
        'nama_anak_magang',
        'nama_sekolah',
        'divisi',
    ];
}
