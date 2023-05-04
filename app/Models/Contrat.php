<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Produit;

class Contrat extends Model
{
    use HasFactory;
    protected $fillable = ['id',"type","periode","montant","commission"];

    public function partenaire(){
       return $this->hasMany(User::class,"contrat_id");
    }

    // public function admin(){
    //     return $this->belongsTo(User::class,"id_admine");
    // }

}
