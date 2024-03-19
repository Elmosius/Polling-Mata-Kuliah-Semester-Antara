<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';
    protected $primaryKey = 'id_programStudi';
    public $incrementing = false;

    protected $fillable = [
      'id_programStudi',
      'nama_programStudi',
    ];

    public function mataKuliah(){
        return $this->hasMany(MataKuliah::class, "id_programStudi");
    }
}
