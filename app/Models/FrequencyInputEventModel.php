<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequencyInputEventModel extends Model
{
    use HasFactory;
    protected $table = 'frequency_input_events';

    protected $fillable = [
        'ip',
        'personId',
        'date',
        'timestamp',
    ];
}
