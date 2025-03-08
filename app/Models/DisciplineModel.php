<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplineModel extends Model
{
    use HasFactory;

    protected $table = 'disciplines';

    protected $fillable = ['name','status','year', 'organization_id'];

}
