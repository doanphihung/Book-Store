<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert(
            [
                ['method' => 'ATM',
                    'status' => '1'],

                ['method' => 'Direct bank transfer',
                    'status' => '1'],

                ['method' => 'COD',
                    'status' => '1'],
            ]
        );
    }
}
