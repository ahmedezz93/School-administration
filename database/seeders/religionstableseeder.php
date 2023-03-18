<?php

namespace Database\Seeders;

use App\Models\religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class religionstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

DB::table('religions')->delete();


$religions=[

[
    "ar"=>"مسلم",
    "en"=>"muslim"
],

[
    "ar"=>"مسيحي",
    "en"=>"christian"
],
[
  "ar"=>"غير ذلك",
  "en"=>"other"
]


];

foreach($religions as $religion){

    religion::create([

        "name"=>$religion,
        
        ]);


}
    }
}
