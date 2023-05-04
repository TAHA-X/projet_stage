<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reseau extends Model
{
    use HasFactory;
    protected $fillable = ["id_client","id_part_send","id_part_receive"];

    public function client(){
        return $this->belongsTo(User::class,"id_client");
    }

    public function partenaire_send(){
        return $this->belongsTo(User::class,"id_part_send");
    }

    public function partenaire_receive(){
        return $this->belongsTo(User::class,"id_part_receive");
    }
}
