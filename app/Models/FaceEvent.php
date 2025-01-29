<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaceEvent extends Model
{
    protected $fillable = [
        'name', 'image', 'event', 'timestamp', 'user_id', 'external_id', 'organization_id', 'group_id'
    ];

    public static function createFaceEvent($name, $image, $event, $timestamp, $user_id, $external_id, $organization_id, $group_id)
    {
        return self::create([
            'name' => $name,
            'image' => $image,
            'event' => $event,
            'timestamp' => $timestamp,
            'user_id' => $user_id,
            'external_id' => $external_id,
            'organization_id' => $organization_id,
            'group_id' => $group_id
        ]);
    }
}
