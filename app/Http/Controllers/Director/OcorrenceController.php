<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\UserOrganizationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OcorrenceController extends Controller
{
    public function getDashboard(){
        
        $user = Auth::user();

        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        return view('director.ocurrence.dashboard', compact('org'));

    }

    public function getDetail(){

        $user = Auth::user();

        $org = UserOrganizationModel::where('user_id', $user->id)->first();

        return view('director.ocurrence.detail', compact('org'));
    }
}
