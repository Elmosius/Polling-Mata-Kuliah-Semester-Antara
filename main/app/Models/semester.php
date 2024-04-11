<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class semester extends Model
{
    use HasFactory;

    protected $table = 'semester';
    protected $primaryKey = 'id_semester';
    protected $fillable = [
        'id_semester' ,
        'semester'
    ];

    public $incrementing = false;

    public function mataKuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class);
    }

}
