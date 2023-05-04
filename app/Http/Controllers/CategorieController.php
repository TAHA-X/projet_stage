<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function categories_list()
    {
        $categories = Categorie::all();
        $categories_list = view("dashboard.admin.categories.components.list", compact("categories"));
        return $categories_list;
    }
    public function index()
    {
        $categories_list = $this->categories_list()->render();
        return view("dashboard.admin.categories.index", compact("categories_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view("dashboard.admin.categories.pages.add",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "title" => "required",
        ]);
        $categorie = new Categorie();
        $categorie->title = $request->title;
        $categorie->id_parent = $request->id_parent;
        $categorie->save();
        return redirect()->route("admin.categories.index")->with("message", "categorie est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::where("id", $id)->first();
        if ($categorie) {
            $categorie->delete();
            return redirect()->route("admin.categories.index")->with("message", "categorie est supprimé avec succé");
        } else {
            return redirect()->route("admin.categories.index");
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
        $categorie = Categorie::where("id", $id)->first();
        $categories = Categorie::where("id","!=",$id)->get();
        if ($categorie) {
            return view("dashboard.admin.categories.pages.edit", compact("categorie","categories"));
        } else {
            return redirect()->route("admin.categories.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "title" => "required",
        ]);


        $categorie = Categorie::where("id", $id)->first();
        if ($categorie) {
            $categorie->title = $request->title;
            $categorie->id_parent = $request->id_parent;
            $categorie->save();
            return redirect()->route("admin.categories.index")->with("message", "categorie est modifié avec succé");
        } else {
            return redirect()->route("admin.categories.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
}
