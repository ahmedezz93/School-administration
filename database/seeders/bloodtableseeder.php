<?php

namespace Database\Seeders;
use App\Models\blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bloodtableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

DB::table('bloods')->delete();

       $bloods=["+A","-A","B+","B-","O+","O-"];
       foreach($bloods as $blood){



        blood::create([

          "name"=>$blood,

                  ]);

       }
    }
}
