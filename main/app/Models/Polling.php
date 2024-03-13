<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';
    protected $primaryKey = 'id_polling';

    protected $fillable = [
        'id_polling',
        'tanggal_dibuka',
        'tanggal_ditutup',
    ];

    public function pollingDetail(){
        return $this->hasMany(User::class, "id_polling");
    }
}
