<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'role_id';
    public $incrementing = false;
    protected $fillable = [
      'id_role',
      'nama_role',
    ];

    public function users(){
        return $this->hasMany(User::class, "id_role");
    }
}
