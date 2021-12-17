<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    //
    public function index(Request $request)
    {
        return View("rewards");
    }
}
