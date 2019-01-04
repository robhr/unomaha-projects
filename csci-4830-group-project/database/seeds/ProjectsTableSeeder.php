<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logSeedData = array();
        $projectsSeedData = array();
        
        for($i = 0; $i < 5; $i++)
        {
            $project = [
                'title' => str_random(rand(8, 13)),
                'description' => str_random(rand(30, 100)),
                'created_at' => Carbon::now()->subDays(rand(181, 365))->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];

            array_push($projectsSeedData, $project);

            array_push($logSeedData, [
                'user_id' => DB::table('users')->inRandomOrder()->first()->id,
                'text' => 'Project: \'' . $project['title'] . '\' was created',
                'created_at' => $project['created_at'],
                'updated_at' => $project['updated_at']
            ]);
        }

        DB::table('projects')->insert($projectsSeedData);
        DB::table('logs')->insert($logSeedData);
    }
}
