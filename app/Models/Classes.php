<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'id_institution',
        'type',
        'identification',
        'name',
        'description',
        'qtd_students',
        'status',
    ];

    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'id_institution');
    }
}
