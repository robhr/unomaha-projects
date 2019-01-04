<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = array(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$D55BDZ3TczSXOiwgkEH1zeyeoq/6/mwLGsh1xH0OdgZckerShV14u', // plaintext: password
                'remember_token' => NULL,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        );

        DB::table('users')->insert($seedData);
    }
}
