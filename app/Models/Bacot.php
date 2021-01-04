<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bacot extends Model
{
    use HasFactory;
    protected $table = 'bacot';
    protected $fillable=['namafile', 'tanggal', 'judul', 'isi', 'kota', 'provinsi'];

}
