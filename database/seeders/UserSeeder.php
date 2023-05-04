<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $responsable = new User();
        $responsable->fname = "responsable";
        $responsable->lname = "test";
        $responsable->email = "responsable@gmail.com";
        $responsable->password = Hash::make("12345678");
        $responsable->phone = 678965643;
        $responsable->level_id = 1;
        $responsable->save();

        $admin = new User();
        $admin->fname = "admin";
        $admin->lname = "test";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make("12345678");
        $admin->phone = 678965643;
        $admin->level_id = 2;
        $admin->save();

        // $partenaire = new User();
        // $partenaire->fname = "partenaire";
        // $partenaire->lname = "test";
        // $partenaire->email = "partenaire@gmail.com";
        // $partenaire->password = Hash::make("12345678");
        // $partenaire->phone = 678965643;
        // $partenaire->level_id = 3;
        // $partenaire->save();

        $client = new User();
        $client->fname = "client";
        $client->lname = "test";
        $client->email = "client@gmail.com";
        $client->password = Hash::make("12345678");
        $client->phone = 678965643;
        $client->level_id = 4;
        $client->save();
    }
}
