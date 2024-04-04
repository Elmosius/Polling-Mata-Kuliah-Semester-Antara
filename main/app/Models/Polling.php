<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Polling extends Model
{
    use HasFactory;

    protected $table = 'polling';
    protected $primaryKey = 'id_polling';
    public $incrementing = false;

    protected $fillable = [
        'id_polling',
        'start_at',
        'end_at',
        'is_active',
    ];

    public function pollingDetail(): HasMany
    {
        return $this->hasMany(PollingDetail::class, "id_polling");
    }


}
