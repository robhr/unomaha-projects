<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Check if $seedData already contains row
     *
     * @return boolean
     */
    private function uniqueData($seedData, $customer, $project)
    {
        for($i = 0; $i < count($seedData); $i++)
        {
            if($seedData[$i]['customer_id'] == $customer->id && $seedData[$i]['project_id'] == $project->id)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logSeedData = array();
        $purchaseSeedData = array();

        for($i = 0; $i < 1000; $i++)
        {
            $customer = DB::table('customers')->inRandomOrder()->first();
            $project = DB::table('projects')->inRandomOrder()->first();

            if($this->uniqueData($purchaseSeedData, $customer, $project))
            {
                $purchase = [
                    'customer_id' => $customer->id,
                    'project_id' => $project->id,
                    'amount' => [49.99, 149.99, 299.99][rand(0, 2)],
                    'created_at' => Carbon::now()->subDays(rand(1, 220))->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];

                array_push($purchaseSeedData, $purchase);

                array_push($logSeedData, [
                    'user_id' => DB::table('users')->inRandomOrder()->first()->id,
                    'text' => $customer->username . ' purchased project \'' . $project->title . '\' for ' . $purchase['amount'],
                    'created_at' => $purchase['created_at'],
                    'updated_at' => $purchase['updated_at']
                ]);
            }
        }

        DB::table('purchases')->insert($purchaseSeedData);
        DB::table('logs')->insert($logSeedData);
    }
}
