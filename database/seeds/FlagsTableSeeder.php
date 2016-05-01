<?php

use Illuminate\Database\Seeder;

class FlagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flags')->insert([
            [
                'name' => 'Master Card',
                'code' => 'MASTER',
            ],
            [
                'name' => 'American Express',
                'code' => 'AMEX',
            ],
            [
                'name' => 'Visa',
                'code' => 'VISA',
            ],
            [
                'name' => 'Diners Club',
                'code' => 'DINERS'
            ]
        ]);
    }
}
