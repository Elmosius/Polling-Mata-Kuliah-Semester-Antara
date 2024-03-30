<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';
    protected $primaryKey = 'id_program_studi';
    public $incrementing = false;

    protected $fillable = [
      'id_program_studi',
      'nama_program_studi',
    ];

    public function mataKuliah(): HasMany{
        return $this->hasMany(MataKuliah::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
