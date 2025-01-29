<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationModel;
use App\Models\PerfilModel;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function show($id){
        $profiles = PerfilModel::all();
        $organization = OrganizationModel::where('id', $id)->first();
        return view('admin.organizations.show', compact('organization', 'profiles'));
    }
    
    public function index()
    {
        $organizacoes = OrganizationModel::all();
        return view('admin.organizations.index', compact('organizacoes'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }
    
    public function store(Request $request)
    {
        OrganizationModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 1,
        ]);
    
        return redirect()->route('admin.organizacoes.index')->with('success', 'Organização criada com sucesso!');
    }

    public function edit(OrganizationModel $organizacao)
    {
        return view('admin. organizations.edit', compact('organizacao'));
    }

    public function update(Request $request, OrganizationModel $organizacao)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $organizacao->update($request->all());

        return redirect()->route('organizacoes.index')->with('success', 'Organização atualizada com sucesso!');
    }

    public function destroy(OrganizationModel $organizacao)
    {
        $organizacao->delete();

        return redirect()->route('organizacoes.index')->with('success', 'Organização excluída com sucesso!');
    }
}
