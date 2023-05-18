<?php

namespace App\Http\Controllers;

use App\Models\GestionPoint;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function systems_list()
    {
        $systems = system::all();
        $systems_list = view("dashboard.admin.systems.components.list", compact("systems"));
        return $systems_list;
    }
    public function index()
    {
        $systems_list = $this->systems_list()->render();
        return view("dashboard.admin.systems.index", compact("systems_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $points = GestionPoint::all();
        $partenaires = User::where("level_id",3)->get();
        return view("dashboard.admin.systems.pages.add",compact("partenaires","points"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "id_partenaire"=>"required|numeric",
            "id_point"=>"required|numeric",
        ]);
        $system = new system();
        $system->id_partenaire = $request->id_partenaire;
        $system->id_point = $request->id_point;
        $system->save();
        return redirect()->route("admin.systems.index")->with("message", "system est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $system = system::where("id", $id)->first();
        if ($system) {
            $system->delete();
            return redirect()->route("admin.systems.index")->with("message", "system est supprimé avec succé");
        } else {
            return redirect()->route("admin.systems.index");
        }
    }

    public function show(string $id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $system = system::where("id", $id)->first();
        $points = GestionPoint::all();
        $partenaires = User::where("level_id",3)->get();
        if ($system) {
            return view("dashboard.admin.systems.pages.edit", compact("system","partenaires","points"));
        } else {
            return redirect()->route("admin.systems.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "id_partenaire"=>"required|numeric",
            "id_point"=>"required|numeric",
        ]);
        $system = system::where("id", $id)->first();
        if ($system) {
            $system->id_partenaire = $request->id_partenaire;
            $system->id_point = $request->id_point;
            $system->save();
            return redirect()->route("admin.systems.index")->with("message", "system est modifié avec succé");
        } else {
            return redirect()->route("admin.systems.index");
        }
    }
       
  
}
