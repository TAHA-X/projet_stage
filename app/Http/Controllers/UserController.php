<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contrat;
use Illuminate\Validation\Rule;
use App\Models\Categorie;
use App\Models\GestionPoint;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function users_list(){
        $users = User::where("id","!=",auth()->user()->id)->get();
        $users_list = view("dashboard.admin.users.components.list",compact("users"));
        return $users_list;
    }
    public function index()
    {
        $users_list = $this->users_list()->render();
        return view("dashboard.admin.users.index",compact("users_list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types_points = GestionPoint::all();
        $categories = Categorie::all();
        $contrats = Contrat::all();
        $partenaires = User::where("level_id",3)->get();
        return view("dashboard.admin.users.pages.add",compact("categories","contrats","partenaires","types_points"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "fname"=>"required",
            "lname"=>"required",
            "email"=>"required|email|unique:users",
            "phone"=>"required|numeric",
            "level_id"=>"required|numeric",
        ]);
        $id_contrat = Contrat::where("type",3)->first()->id;
        if($request->id_contrat){
            $id_contrat= $request->id_contrat;
        }
        $categorie_id = null;
        if($request->categorie_id!=null){
            $categorie_id= $request->categorie_id;
        } 
        $type_point = null;
        if($request->type_point){
            $type_point = $request->type_point;
        } 
        $partenaire_id = null;
        if($request->partenaire_id){
            $partenaire_id= $request->partenaire_id;
        }      
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make("12345678");
        $user->phone = $request->phone;
        $user->level_id = $request->level_id;
        $user->contrat_id = $id_contrat;
        $user->categorie_id = $categorie_id;
        $user->partenaire_id = $partenaire_id;
        $user->type_point = $type_point;
        $user->save();
        return redirect()->route("admin.users.index")->with("message","user est ajouté avec succé");
    }

    /**
     * Display the specified resource.
     */
    public function destroy(string $id)
    {
        $user = User::where("id",$id)->first();
        if($user){
            $clients = User::where("partenaire_id",$id)->get();
            foreach($clients as $client){
                $client->delete();
            }
            $user->delete(); 
            return redirect()->route("admin.users.index")->with("message","user est supprimé avec succé");
        }
        else{
            return redirect()->route("admin.users.index");
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
        $types_points = GestionPoint::all();
        $user = User::where("id",$id)->first();
        $contrats = Contrat::all();
        $categories = Categorie::all();
        $partenaires = User::where("level_id",3)->get();
        if($user){
            return view("dashboard.admin.users.pages.edit",compact("user","contrats","categories","partenaires","types_points"));
        }
        else{
            return redirect()->route("admin.users.index");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "fname"=>"required",
            "lname"=>"required",
            "email"=>["email","required",Rule::unique(User::class)->ignore($id)],
            "phone"=>"required|numeric",
            "level_id"=>"required|numeric",
        ]);
        $user = User::where("id",$id)->first();
        if($user){
            $id_contrat = Contrat::where("type",3)->first()->id;
            if($request->id_contrat){
                $id_contrat= $request->id_contrat;
            }
            $categorie_id = $user->categorie_id;
            if($request->categorie_id){
                $categorie_id= $request->categorie_id;
            } 
            $type_point = null;
            if($request->type_point){
                $type_point = $request->type_point;
            } 
            $partenaire_id = $user->partenaire_id;
            if($request->partenaire_id){
                $partenaire_id= $request->partenaire_id;
            }        
            $user->categorie_id = $categorie_id;
            $user->contrat_id = $id_contrat;
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $password = $user->password;
            $user->partenaire_id = $partenaire_id;
            $user->type_point = $type_point;
            if($request->password){
                $password = Hash::make($request->password);
            }
            $user->password = $password;
            $user->phone = $request->phone;
            $user->level_id = $request->level_id;
            $user->save();
            return redirect()->route("admin.users.index")->with("message","user est modifié avec succé");
        }
        else{
            return redirect()->route("admin.users.index");
        }
    }

    public function contrat_type_partenaire($id){
        $type = $id;
        return response()->json($type);
    }

    public function contrat_type_partenaire2($type){
        $contrats = Contrat::where("type",$type)->get();
        // return $id;
        return response()->json($contrats);
    }

    /**
     * Remove the specified resource from storage.
     */
    
}
