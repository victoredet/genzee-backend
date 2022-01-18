<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use App\Models\Investment;


use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index()
    {
        return Investment::all(); 
    }

    public function Invest(Request $request, $id)
    {
        //get user
        $user = User::where('id', $id)->get();


        //subtract from user account balance
        if(!$user['amount']<$request['amount']){
            return 'insuficient funds';
        }

        if($user['account']<$request['amount']){
            $new_account_bal = $user['amount']-$request['amount'];

            User::where('id', $id)->update([
                'account'=>$new_account_bal
            ]);
        }

        //create investment
        Investment::create([
            'user_id'=>$id,
            'amount'=>$request['amount'],
            'daily_count'=>0,
            'investment_status'=>'active',
            'profit'=>$id,
        ]);


        // return user's investments
        return Investment::where('user_id',$id)->get();
    }

    
    public function transferProfit(Request $request, $id)
    {
        //get investment
        $investment = Investment::where('id', $id)->get();
        //get user id
        $user_id = $investment['user_id'];
        
         //get user account
         $user = User::where('id',$user_id)->get();
         $new_profit = $user['profit']+$investment['profit'];
         
         //update user account
        User::where('id', $user_id)->update([
            'profit'=>$new_profit
        ]);
        //update investment
        Investment::where('id', $id)->update([
            'profit'=>0
        ]);
        //return user's investment
        return Investment::where('user_id', $user_id)->get();
    }   

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
