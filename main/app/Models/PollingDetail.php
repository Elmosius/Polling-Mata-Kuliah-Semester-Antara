<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "id_user");
    }

    public function polling(): BelongsTo
    {
        return $this->belongsTo(Polling::class, "id_polling");
    }

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, "id_mataKuliah");
    }
}
