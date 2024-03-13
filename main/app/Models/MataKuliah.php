<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_mataKuliah';

    protected $fillable = [
      'id_mataKuliah',
      'nama_mataKuliah',
      'id_programStudi',
      'sks',
      'hari',
      'jam',
      'id_kurikulum',
    ];

    public function pollingDetail(){
        return $this->hasMany(User::class, "id_mataKuliah");
    }

    public function programStudi(){
        return $this->belongsTo(ProgramStudi::class, "id_programStudi");
    }

    public function kurikulum(){
        return $this->belongsTo(Kurikulum::class, "id_kurikulum");
    }
}
