<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalRumahSakit extends Model
{
    use HasFactory;
    protected $fillable = ['rumah_sakit_id', 'day', 'start', 'end'];
}
