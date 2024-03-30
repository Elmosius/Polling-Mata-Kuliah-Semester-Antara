<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';
    protected $primaryKey = 'id_kurikulum';
    public $incrementing = false;

    protected $fillable = [
      'id_kurikulum',
      'tahun',
    ];

    public function mataKuliah(){
        return $this->hasMany(MataKuliah::class);
    }
}
