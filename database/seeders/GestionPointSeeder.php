<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionPoint;

class GestionPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $point = new GestionPoint();
        $point->type = "pointA";
        $point->valueDH = 10;
        $point->valuePoint = 2;
        $point->save();
    }
}
