<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_mataKuliah';
    public $incrementing = false;

    protected $fillable = [
      'id_mataKuliah',
      'nama_mataKuliah',
      'id_program_studi',
      'sks',
      'id_semester',
      'id_kurikulum',
    ];

    public function pollingDetail(): HasMany{
        return $this->hasMany(User::class);
    }

    public function programStudi(): BelongsTo{
        return $this->belongsTo(ProgramStudi::class, 'id_program_studi');
    }

    public function kurikulum(): BelongsTo{
        return $this->belongsTo(Kurikulum::class, 'id_kurikulum');
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }
}
