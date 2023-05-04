<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ["id_contrat","taux","prix","title"];

    public function partenaire(){
        return $this->belongsTo(User::class,"id_partenaire");
    }
}
