<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = "type";

    protected $fillable = [
        'nama_type',
        'spesifikasi',
        'ukuran',
        'harga',
    ];

    protected $guarded = ['id'];

    public function data_rumah()
    {
        return $this->hasMany(Datarumah::class);
    }
}
