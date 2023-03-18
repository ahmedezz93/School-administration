<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class settingstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
DB::table('settings')->delete();
setting::create([
"school_name"=>"alshohdaa",
"current_year"=>date('Y'),
"Abbreviated_school_name"=>"alshohdaa",
"phone_number"=>"0123456",
"email"=>"alshodaa@gmail.com",
"school_address"=>"cairo",
"The_end_of_the_first_term"=>"01-01-2023",
"The_end_of_the_second_term"=>"01-08-2023",
"file_name"=>"logo",
]);
}
}
