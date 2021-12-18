<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;

class RewardController extends Controller
{
    //
    public function index(Request $request)
    {

        return View("rewards");
    }
    
    public function addRewardPoints(Request $request)
    {
        $msg = "Request success";
        $salesAmount = $request->all()["salesAmount"];
        $rewardedPoints = $request->all()["rewardPoints"];
        $remainPoints = $request->all()["remainPoints"];
        $customerId=$request->all()["customerId"];
        $rewardPoints = $salesAmount * 1;
        $status = "complete";

        $remainingPoints = $rewardPoints + $remainPoints;
        $expireDate = now()->addYear()->format('d/m/Y');
        $newOrder = $request->all()["newOrder"];
        $reward_price = $remainingPoints * 0.01;
        $this->saveRewardsInDB($remainingPoints, $reward_price,$customerId);

        if ($newOrder == 'true') {
            return response()->json(array(
                'msg' => $msg,
                'rewardPoints' => $remainingPoints,
                'remainingPoints' => 0,
                'expireDate' => $expireDate,
                'status' => "Incomplete",
                'rewardPrice' => $reward_price
            ), 200);
        }
       
        return response()->json(array(
            'msg' => $msg,
            'rewardPoints' => $rewardPoints,
            'remainingPoints' => $remainingPoints,
            'expireDate' => $expireDate,
            'status' => $status,
            'rewardPrice' => "0"
        ), 200);
    }

    public function saveRewardsInDB($remainingPoints, $reward_price,$customerId)
    { 
        $issuedDate=now();
        $result = DB::insert("INSERT INTO `rewards`(`id`, `rewarded_price`, `rewarded_points`, `issued_date`, `status`) VALUES 
                             (NULL,'$reward_price', '$remainingPoints','$issuedDate','')");

        $reward_id = DB::table('rewards')->latest('id')->first();
        $result2=  DB::insert("INSERT INTO `transaction`(`id`, `customer_id`, `product_id`, `status`, `rewards_id`) 
                   VALUES (null,'$customerId','1','','$reward_id->id')");
        return;
    }
}
