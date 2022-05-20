<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsoType;
use App\Models\Operator;

class HomeController extends Controller
{
    //
    public function index(){
        $operator = Operator::all();
        $iso = IsoType::all();
        return view("welcome")->with("operator",$operator)->with("iso",$iso);
    }
}
