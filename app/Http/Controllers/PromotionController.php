<?php

namespace App\Http\Controllers;

use App\Http\Requests\promotionrequest;
use App\interface\promotionrepositoryinterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $promotions;

    public function __construct(promotionrepositoryinterface $promotions)
    {
        $this->promotions = $promotions;
    }



    public function create(){

        return $this->promotions->promotion_index();
    }


    public function store(promotionrequest $request){
              $request->validated();
        return $this->promotions->promotion_store($request);

    }

}
