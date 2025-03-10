<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\FrequencyInputEventModel;
use App\Models\RoomModel;
use App\Models\User;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function show($id)
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();
        $room = RoomModel::find($id);

        // Agrupar as frequências por personId
        $frequencies = FrequencyInputEventModel::with('user')
            ->where('ip', $room->ip_device)
            ->get()
            ->groupBy('personId');  // Agrupa por personId (ou qualquer campo único para identificar o usuário)

        // Passar as frequências agrupadas para a view
        return view('director.rooms.show', [
            'room' => $room,
            'org' => $org,
            'frequencies' => $frequencies,
        ]);
    }


public function detail($studentId, $roomIp)
{
    // Buscar o aluno
    $user = User::where('id', $studentId)->first();

    $room = RoomModel::where('id', $roomIp)->first();

    // Verificar se o aluno existe
    if (!$user) {
        return redirect()->back()->with('error', 'Aluno não encontrado!');
    }

    // Buscar as frequências desse aluno na sala especificada (com base no IP da sala)
    $frequencies = FrequencyInputEventModel::with('user')
        ->where('personId', $user->id)
        ->where('ip', $room->ip_device)
        ->get();

    // Passar os dados para a view
    return view('director.rooms.detail', compact('user', 'frequencies'));
}


}
