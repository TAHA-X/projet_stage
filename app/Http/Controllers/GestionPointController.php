<?php

namespace App\Http\Controllers;

use App\Models\GestionPoint;
use Illuminate\Http\Request;


class GestionPointController extends Controller
{
    public function points_list()
    {
        $points = GestionPoint::all();
        $points_list = view("dashboard.admin.points.components.list", compact("points"));
        return $points_list;
    }
    public function index()
    {
        $points_list = $this->points_list()->render();
        return view("dashboard.admin.points.index", compact("points_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view("dashboard.admin.points.pages.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "required",
            "valueDH"=>"required",
            "valuePoint"=>"required"
        ]);
        $point = new GestionPoint();
        $point->type = $request->type;
        $point->valueDH = $request->valueDH;
        $point->valuePoint = $request->valuePoint;
        $point->save();
        return redirect()->route("admin.points.index")->with("message", "point est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $point = GestionPoint::where("id", $id)->first();
        if ($point) {
            $point->delete();
            return redirect()->route("admin.points.index")->with("message", "point est supprimé avec succé");
        } else {
            return redirect()->route("admin.points.index");
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
        $point = GestionPoint::where("id", $id)->first();
        if ($point) {
            return view("dashboard.admin.points.pages.edit", compact("point"));
        } else {
            return redirect()->route("admin.points.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "type" => "required",
            "valueDH"=>"required|integer",
            "valuePoint"=>"required|integer"
        ]);

        $point = GestionPoint::where("id", $id)->first();
        $point->type = $request->type;
        if ($point) {
            $point->valueDH = $request->valueDH;
            $point->valuePoint = $request->valuePoint;
            $point->save();
            return redirect()->route("admin.points.index")->with("message", "point est modifié avec succé");
        } else {
            return redirect()->route("admin.points.index");
        }
    }
}
