<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\System;
use App\Models\User;


class GestionPoint extends Model
{
    use HasFactory;
    protected $fillable = ["type","valueDH","valuePoint"];

    public function systems(){
        return $this->hasMany(System::class,'id_point');
    }

    public function partenaires(){
        return $this->hasMany(User::class,"type_point");
    }

}
