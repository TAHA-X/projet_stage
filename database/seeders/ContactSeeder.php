<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contrat;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abonnement = new Contrat();

        $abonnement->type = 1;
        $abonnement->periode = 5;
        $abonnement->montant = 1000;
        $abonnement->save();
 
        $commission = new Contrat();

        $commission->type = 2;
        $commission->commission = 100;
        $commission->save();


        $commission_variable = new Contrat();
        
        $commission_variable->type = 3;
        $commission_variable->save();


    }
}
