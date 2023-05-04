<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\User;

class ProduitController extends Controller
{
    public function produits_list()
    {
        $produits = produit::all();
        $produits_list = view("dashboard.admin.produits.components.list", compact("produits"));
        return $produits_list;
    }
    public function index()
    {
        $produits_list = $this->produits_list()->render();
        return view("dashboard.admin.produits.index", compact("produits_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partenaires = User::where("level_id",3)->get();
        return view("dashboard.admin.produits.pages.add",compact("partenaires"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "title" => "required",
            "id_partenaire"=>"required|numeric",
            "prix"=>"required|numeric",
        ]);
        $produit = new produit();
        $produit->title = $request->title;
        $produit->id_partenaire = $request->id_partenaire;
        $produit->prix = $request->prix;
        if($request->taux){
            $produit->taux = $request->taux;
        }
        $produit->save();
        return redirect()->route("admin.produits.index")->with("message", "produit est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $produit = produit::where("id", $id)->first();
        if ($produit) {
            $produit->delete();
            return redirect()->route("admin.produits.index")->with("message", "produit est supprimé avec succé");
        } else {
            return redirect()->route("admin.produits.index");
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
        $produit = produit::where("id", $id)->first();
        $partenaires = User::where("level_id",3)->get();
        if ($produit) {
            return view("dashboard.admin.produits.pages.edit", compact("produit","partenaires"));
        } else {
            return redirect()->route("admin.produits.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "title" => "required",
            "id_partenaire"=>"required|numeric",
            "prix"=>"required|numeric",
        ]);
        $produit = produit::where("id", $id)->first();
        if ($produit) {
            $produit->title = $request->title;
            $produit->id_partenaire = $request->id_partenaire;
            $produit->prix = $request->prix;
            if($request->taux){
                $produit->taux = $request->taux;
            }
            $produit->save();
            return redirect()->route("admin.produits.index")->with("message", "produit est modifié avec succé");
        } else {
            return redirect()->route("admin.produits.index");
        }
}
}
