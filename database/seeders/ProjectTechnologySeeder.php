<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTechnology;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $new_proj_tech = new ProjectTechnology();

            $new_proj_tech->project_id = Project::inRandomOrder()->first()->id;
            $new_proj_tech->technology_id = Technology::inRandomOrder()->first()->id;

            $new_proj_tech->save();
        }
    }
}
