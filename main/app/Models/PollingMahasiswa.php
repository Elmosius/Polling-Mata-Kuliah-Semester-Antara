<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling_mahasiswa';
    protected $primaryKey = 'id_polling_mahasiswa';
    public $incrementing = false;

    protected $fillable = [
        'id_polling_mahasiswa',
        'tanggal_dibuka',
        'tanggal_ditutup',
    ];

    public function pollingDetail(){
        return $this->hasMany(User::class, "id_polling");
    }
}
