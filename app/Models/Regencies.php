<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencies extends Model
{
    use HasFactory;
    protected $table = 'regencies';
    protected $fillable=['name', 'province_id'];

}
