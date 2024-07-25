<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Funny', 'Sad', 'Intriguing', 'Mysterious', 'Scary', 'Lonely', 'Angry'];
        foreach ($types as $type) {
            $project = new Type();
            $project->title = $type;
            $project->slug = Str::of($type)->slug();
            $project->save();
        }
    }
}
