<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\User;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function contrats_list()
    {
        $contrats = contrat::all();
        $contrats_list = view("dashboard.admin.contrats.components.list", compact("contrats"));
        return $contrats_list;
    }
    public function index()
    {
        $contrats_list = $this->contrats_list()->render();
        return view("dashboard.admin.contrats.index", compact("contrats_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contrats = Contrat::all();
        $partenaires = User::where("level_id","3")->get();
        return view("dashboard.admin.contrats.pages.add",compact("contrats","partenaires"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "type" => "required|numeric",
        ]);
        $contrat = new contrat();
        $contrat->type = $request->type;
        if($request->type==0){
             $contrat->periode = $request->periode;
             $contrat->montant = $request->montant;
        }
        else{
            $contrat->commission = $request->commission;
        }
        $contrat->save();
        return redirect()->route("admin.contrats.index")->with("message", "contrat est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $contrat = contrat::where("id", $id)->first();
        if ($contrat) {
            $contrat->delete();
            return redirect()->route("admin.contrats.index")->with("message", "contrat est supprimé avec succé");
        } else {
            return redirect()->route("admin.contrats.index");
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
        $contrat = contrat::where("id", $id)->first();
        $partenaires = User::where("level_id","3")->get();
        
        if ($contrat) {
            return view("dashboard.admin.contrats.pages.edit", compact("contrat","partenaires"));
        } else {
            return redirect()->route("admin.contrats.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            "type" => "required|numeric",
        ]);
        $contrat = contrat::where("id", $id)->first();
        if ($contrat || $contrat->type!==2) {
            $contrat->type = $request->type;
            if($request->type==0){
                 $contrat->periode = $request->periode;
                 $contrat->montant = $request->montant;
                 $contrat->commission = null;
            }
            else{
                $contrat->commission = $request->commission;
                $contrat->periode = null;
                 $contrat->montant = null;
            }
            $contrat->save();
            return redirect()->route("admin.contrats.index")->with("message", "contrat est modifié avec succé");
        } else {
            return redirect()->route("admin.contrats.index");
        }
    }

    public function contrat_type($id){
        if($id==0){
            $type = 0;
            return response()->json($type);
        }
        if($id==1){
            $type = 1;
            return response()->json($type);     
        }
    }
    /**
     * Remove the specified resource from storage.
     */
}
