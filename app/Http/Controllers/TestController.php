<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\Utilities\RocketShip;

class TestController extends Controller
{

    public function index()
    {

        //return RocketShip::blastOff();
        return view('test.index');

    }

}