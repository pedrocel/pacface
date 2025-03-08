<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\FrequencyInputEventModel;
use App\Models\RoomModel;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $rooms = RoomModel::where('organization_id', $org->organization_id)->get();perPage: 

        return view('director.rooms.index', data: compact('rooms', 'org'));
    }

    public function create()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        return view('director.rooms.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        RoomModel::create([
            'organization_id' => $org->organization_id,
            'name' => $request->name,
            'status' => $request->status,
            'ip_device' => $request->ip_device,
        ]);

        return redirect()->route('director.room.index');
    }

    public function show($id){

        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $room = RoomModel::find($id);

        $frequencies = FrequencyInputEventModel::with('user')->where('ip', $room->ip_device)->get();

        return view('director.rooms.show', data: compact('room', 'org', 'room', 'frequencies'));
    }
}
