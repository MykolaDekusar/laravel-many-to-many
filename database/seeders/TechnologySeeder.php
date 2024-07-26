<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        $types = ['Quantum Computing', 'Blockchain', 'Artificial Intelligence (AI)', 'Augmented Reality (AR)', 'Nanotechnology', 'Virtual Reality (VR)', 'Edge Computing'];
        foreach ($types as $type) {
            $project = new Technology();
            $project->title = $type;
            $project->slug = Str::of($type)->slug();
            $project->save();
        }
        Schema::enableForeignKeyConstraints();
    }
}
