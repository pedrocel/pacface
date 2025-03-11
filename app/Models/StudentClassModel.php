<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassModel extends Model
{
    use HasFactory;

    protected $table = 'student_classes'; 

    protected $fillable = ['user_id', 'class_id', 'organization_id'];

    public function userPerfis()
    {
        return $this->hasMany(UserPerfilModel::class, 'perfil_id');
    }
}