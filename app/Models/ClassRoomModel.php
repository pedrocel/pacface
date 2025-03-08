<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoomModel extends Model
{
    use HasFactory;

    protected $table = 'class_room';

    protected $fillable = [
        'organization_id',
        'id_room',
        'id_class',
        'id_teacher',
        'id_discipline',
        'date',
        'start_time',
        'end_time',
        'aula_number',
    ];

    // Defina os casts para tipos específicos
    protected $casts = [
        'date' => 'date', // Cast para data
        'start_time' => 'string', // Cast para string, já que é um horário armazenado como string
        'end_time' => 'string',   // Cast para string
    ];
    

    public function room()
    {
        return $this->belongsTo(RoomModel::class, 'id_room');
    }

    public function classes()
    {
        return $this->belongsTo(ClassModel::class, 'id_class');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'id_teacher');
    }

    public function discipline()
    {
        return $this->belongsTo(DisciplineModel::class, 'id_discipline');
    }
}
