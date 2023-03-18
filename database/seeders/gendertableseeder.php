<?php

namespace Database\Seeders;
use App\Models\gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class gendertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('genders')->delete();
       $genders=[

        ["ar"=>"ذكر","en"=>"male"],

        ["ar"=>"انثى","en"=>"female"],

       ];

       foreach($genders as $gender){

       gender::create([

           "name"=>$gender,

       ]);

       }


}
}
