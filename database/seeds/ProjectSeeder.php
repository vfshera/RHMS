<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
             'image' => 'const.jpg',
             'starting_date' => '2020-03-15',
             'project_span' => '24 months',
             'location' => 'Lamu County',
             'progress' => '0'
        ]);

        Project::create([
            'image' => 'construction.jpg',
            'starting_date' => '2020-11-03',
            'project_span' => '7 months',
            'location' => 'Meru County',
            'progress' => '0'
        ]);
    }
}
