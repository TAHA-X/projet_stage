<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ["id_parent",'title'];
    
    public function parent(){
        return $this->belongsTo(Categorie::class,"id_parent");
    }

    public function partenaires(){
        return $this->hasMany(User::class,"categorie_id");
    }
}
