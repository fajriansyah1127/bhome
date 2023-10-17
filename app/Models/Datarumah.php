<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datarumah extends Model
{
    use HasFactory;
    protected $table = 'rumah';
    protected $fillable = [
        'user_id',
        'type_id',
        'alamat',
        'pdam',
        'pln',
        'latitude',
        'longtitude',
        'jatuh_tempo',
        'foto',
        'jumlah_penghuni',
    ];

    protected $guarded = ['id'];
}
