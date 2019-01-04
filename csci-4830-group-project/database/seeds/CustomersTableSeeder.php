<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Generate random bytes
     *
     * @return string
     */
    private function hex_random($num_bytes = 2)
    {
        return strtoupper(bin2hex(openssl_random_pseudo_bytes($num_bytes)));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logSeedData = array();
        $customerSeedData = array();
        
        for($i = 0; $i < 1000; $i++)
        {
            $customer = [
                'username' => str_random(10),
                'license_key' => $this->hex_random(2) . '-' . $this->hex_random(2) . '-' . $this->hex_random(2),
                'package' => 'Subscriber',
                'expires_at' => Carbon::now()->addDays(rand(91, 365))->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->subDays(rand(1, 90))->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];

            array_push($customerSeedData, $customer);

            array_push($logSeedData, [
                'user_id' => DB::table('users')->inRandomOrder()->first()->id,
                'text' => $customer['username'] . ' was created with license key \'' . $customer['license_key'] . '\'',
                'created_at' => $customer['created_at'],
                'updated_at' => $customer['updated_at']
            ]);
        }

        DB::table('customers')->insert($customerSeedData);
        DB::table('logs')->insert($logSeedData);
    }
}
