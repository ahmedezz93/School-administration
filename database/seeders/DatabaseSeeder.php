<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\specialization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return $this->call([

            bloodtableseeder::class,
            nationalitiestableseeder::class,
            religionstableseeder::class,
            gendertableseeder::class,
            specializationstableseeder::class,
            settingstableseeder::class,
            usertableseeder::class,


        ]);



    }
}
