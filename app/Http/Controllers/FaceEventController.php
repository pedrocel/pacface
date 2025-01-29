<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaceEvent;

class FaceEventController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Criação do evento facial
        FaceEvent::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'event' => $request->input('event'),
            'timestamp' => $request->input('timestamp'),
            'user_id' => $request->input('user_id'),
            'external_id' => $request->input('external_id'),
            'organization_id' => $request->input('organization_id'),
            'group_id' => $request->input('group_id'),
            'data' => $request->input('data')
        ]);

        return response()->json(['message' => 'Face event created successfully'], 201);
    }
}