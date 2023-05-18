<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionPoint;
use App\Models\User;

class System extends Model
{
    use HasFactory;
    protected $fillable = ["id_partenaire","id_point"];
  
    public function point(){
        return $this->belongsTo(GestionPoint::class,'id_point');
    }

    public function partenaire(){
        return $this->belongsTo(User::class,"id_partenaire");
    }

}
