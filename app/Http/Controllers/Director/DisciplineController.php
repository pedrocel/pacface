<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\DisciplineModel;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisciplineController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        $disciplines = DisciplineModel::where('organization_id', $org->organization_id)->get();perPage: 

        return view('director.discipline.index', data: compact('disciplines', 'org'));
    }

    public function create()
    {
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        return view('director.discipline.create');
    }

    public function store(Request $request){
        
        $user = Auth::user();
        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        
        DisciplineModel::create([
            'organization_id' => $org->organization_id,
            'name' => $request->name,
            'status' => $request->status,
            'year' => $request->year,
        ]);

        return redirect()->route('director.discipline.index');
    }
}
