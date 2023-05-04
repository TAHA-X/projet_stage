<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Contrat;
use App\Models\Reseau;
use App\Models\Invitation;
use App\Models\Produit;
use App\Models\Categorie;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id','fname','lname','email','password','phone','level_id','points','contrat_id','categorie_id'];
    public function contrat(){ 
        return $this->belongsTo(Contrat::class,"contrat_id");
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function contrats(){
    //     return $this->hasMany(Contrat::class,"id_admine");
    // }

    public function reseaux(){
        return $this->hasMany(Reseau::class);
    }

    public function invitations(){
        return $this->hasMany(Invitation::class);
    }

    public function produits(){
        return $this->hasMany(Produit::class,"id_partenaire");
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class,"categorie_id");
    }

}
