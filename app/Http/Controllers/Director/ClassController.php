<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\ClassRoomModel;
use App\Models\DisciplineModel;
use App\Models\RoomModel;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $classes = ClassModel::where('organization_id', $org->organization_id)->get();perPage: 

        return view('director.classes.index', data: compact('classes', 'org'));
    }

    public function create()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        return view('director.classes.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        ClassModel::create([
            'organization_id' => $org->organization_id,
            'name' => $request->name,
            'status' => $request->status,
            'qtd_students' => $request->qtd_students,
            'turn' => $request->turn,
            'year' => $request->year,
        ]);

        return redirect()->route('director.class.index');
    }

        public function edit(ClassModel $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, ClassModel $class)
    {
        $request->validate([
            'name' => 'required',
            'organization_id' => 'nullable|uuid',
            'status' => 'required|integer',
            'qtd_students' => 'nullable|integer',
            'turn' => 'nullable|integer',
            'year' => 'nullable|integer',
        ]);
        $class->update($request->all());
        return redirect()->route('classes.index');
    }

    public function destroy(ClassModel $class)
    {
        $class->delete();
        return redirect()->route('classes.index');
    }

    public function show($id_class)
    {
        $class = ClassModel::find($id_class);
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $students = UserOrganizationModel::where('organization_id', $org->organization_id)->get();
        $teachers = UserOrganizationModel::where('organization_id', $org->organization_id)->get();

        $aulas = ClassRoomModel::where('id_class', $id_class)->get();
        $disciplines = DisciplineModel::where('organization_id', $org->organization_id)->get();
        $rooms = RoomModel::where('organization_id', $org->organization_id)->get();
        $classes = ClassModel::where('organization_id', $org->organization_id)->get();

        return view('director.classes.show', compact('class','classes', 'students', 'teachers', 'aulas', 'disciplines', 'rooms'));  
    }

    public function storeClassRoom(Request $request, $id_class)
    {

        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $aulaTimes = [
            1 => ['start' => '07:00', 'end' => '07:50'],
            2 => ['start' => '07:50', 'end' => '08:40'],
            3 => ['start' => '08:40', 'end' => '09:30'],
            4 => ['start' => '09:50', 'end' => '10:40'],
            5 => ['start' => '10:40', 'end' => '11:30'],
            6 => ['start' => '11:30', 'end' => '12:20'],
        ];

        $aulaTime = $aulaTimes[$request->aula_number];

        $classRoom = ClassRoomModel::create([
            'organization_id' => $org->organization_id,
            'id_room' => $request->id_room,
            'id_class' => $id_class,
            'id_teacher' => $request->id_teacher,
            'id_discipline' => $request->id_discipline,
            'date' => $request->date,
            'start_time' => $aulaTime['start'],
            'end_time' => $aulaTime['end'],
            'aula_number' => $request->aula_number,
        ]);

        return redirect()->route('director.class.show')->with('success', 'Aula criada com sucesso!');
    }
}