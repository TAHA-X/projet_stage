<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invitation extends Model
{
    use HasFactory;
    protected $fillable = ["id_part_send","id_part_receive","status"];

    public function partenaire_send(){
        return $this->belongsTo(User::class,"part_send");
    }

    public function partenaire_receive(){
        return $this->belongsTo(User::class,"part_receive");
    }
}
