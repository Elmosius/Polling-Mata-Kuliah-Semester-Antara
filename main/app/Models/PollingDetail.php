<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    use HasFactory;

    protected $table = 'polling_detail';
    public $incrementing = false;

    protected $fillable = [
        'id_polling',
        'id_user',
        'id_mataKuliah',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, "id_user");
    }

    public function polling()
    {
        return $this->belongsTo(Polling::class, "id_polling");
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, "id_mataKuliah");
    }
}
