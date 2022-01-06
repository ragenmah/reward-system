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
        $customerId = $request->all()["customerId"];
        $rewardPoints = $salesAmount * 1;
        $status = "complete";

        $remainingPoints = $rewardPoints + $remainPoints;
        $expireDate = now()->addYear()->format('d/m/Y');
        $newOrder = $request->all()["newOrder"];
        $reward_price = $remainingPoints * 0.01;
        $this->saveRewardsInDB($remainingPoints, $reward_price, $customerId);

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

    public function saveRewardsInDB($remainingPoints, $reward_price, $customerId)
    {
        $issuedDate = now();
        $result = DB::insert("INSERT INTO `rewards`(`id`, `rewarded_price`, `rewarded_points`, `issued_date`, `status`) VALUES 
                             (NULL,'$reward_price', '$remainingPoints','$issuedDate','')");

        $reward_id = DB::table('rewards')->latest('id')->first();
        $result2 =  DB::insert("INSERT INTO `transaction`(`id`, `customer_id`, `product_id`, `status`, `rewards_id`) 
                   VALUES (null,'$customerId','1','','$reward_id->id')");
        return;
    }

    public function postRewards(Request $request)
    {
        $currency = $request->all()["currency"];
        $price = $request->all()["priceDetails"];
        $customerId = $request->all()["customerId"];
        $orderId = $request->all()["orderId"];
        $status = $request->all()["status"];
        if ($currency == "NPR") {
            //change the price into dollar
            $price = round($price / 119, 4);
        }
        $dateOfSales = now();
        // $customerCheck = DB::raw("select * from rewards where C_ID='$customerId'")->get();
        $ordersCheck = DB::table("sales")->where("Order_ID", $orderId)->get();
        if ($ordersCheck->isNotEmpty()) {
            return response()->json(array(
                'errorMsg' => "You have already ordered using using this orderid",
            ), 200);
        }
        //  DB::raw("select * from rewards where C_ID='$customerId'")->get();
        DB::table("sales")->insert(
            [
                "S_ID" =>  null,
                "C_ID" => $customerId,
                "Order_ID" => $orderId,
                "amount" => $price,
                "status" => $status,
                "date_of_sales" => $dateOfSales
            ]
        );
        if ($status == "COMPLETE") {

            $expireDate = now()->addYear();
            $rewardPoints = $price * 1;

            // $remainingPoints = $rewardPoints + $remainPoints;

            $reward_price = round($rewardPoints * 0.01, 4);
            $customerCheck = DB::table("rewards")->where("C_ID", $customerId)->get();

            if ($customerCheck->isEmpty()) {
                DB::table('rewards')->insert([
                    "R_ID" => null,
                    "C_ID" => $customerId,
                    "reward_points" => $rewardPoints,
                    "reward_amount" => $reward_price,
                    "expire_date" => $expireDate,
                ]);
            } else {
                DB::table('rewards')->where("C_ID", $customerId)->update([
                    "C_ID" => $customerId,
                    "reward_points" => $customerCheck[0]->reward_points + $rewardPoints,
                    "reward_amount" => $customerCheck[0]->reward_amount + $reward_price,
                    "expire_date" => $expireDate,
                ]);
            }
        }
        $rewards = DB::table("rewards")->where("C_ID", $customerId)->get();
        return response()->json(array(
            'rewards' => $rewards,
            'errorMsg' => "",
            'rewardPrice' => "0"
        ), 200);
    }

    public function addRewardUsers(Request $request)
    {
        // $claimDate = $request->all()["nowDate"];
        $rewardAmt = $request->all()["claim_amt"];
        $customerId = $request->all()["customerId"];
        $claimDate = now();
        DB::table('reward_users')->insert([
            "RU_ID" => null,
            "C_ID" => $customerId,
            "used_amount" => $rewardAmt,
            "used_date" => $claimDate,
        ]);

        DB::table('rewards')->where("C_ID", $customerId)->update([
            "C_ID" => $customerId,
            "reward_points" => 0,
            "reward_amount" => 0,
            "expire_date" => null,
        ]);
        return response()->json(array(
            'msg' => "Reward amount Successfully rewarded!",
            'errorMsg' => "",
            'rewardPrice' => "0"
        ), 200);
    }
}
