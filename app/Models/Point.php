<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Point extends Model
{
    use HasFactory;
    protected $fillable = ["id_parten","id_client","points","type"];

    public function partenaire(){
        return $this->belongsTo(User::class,"id_partenaire");
    }

    public function client(){
        return $this->belongsTo(User::class,"id_client");
    }
}
