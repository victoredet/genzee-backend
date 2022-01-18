<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'user_id'=>$id,
        ]);


        // return user's investments
    }

    
    public function store(Request $request)
    {
        //
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
