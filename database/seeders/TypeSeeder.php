<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "Frontend",
            "Backend",
            "Full-stack",
            "Database"
        ];

        foreach($types as $type){
            $newType = new Type();
            $newType->name = $type;
            $newType->save();
        }
    }
}