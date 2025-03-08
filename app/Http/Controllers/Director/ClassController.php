<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
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
}