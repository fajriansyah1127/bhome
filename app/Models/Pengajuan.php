<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $fillable = [
        'user_id',
        'rumah_id',
        'foto',
        'status_pengajuan',
        'catatan'
    ];

    protected $guarded = ['id'];

    public function rumah()
    {
        return $this->belongsTo(Datarumah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}