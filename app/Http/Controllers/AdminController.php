<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function blockUser($id){
        User::where('id', $id)->update([
            'admin_status'=> 'blocked'
        ]);
        return User::all();
    } 

    public function unBlockUser($id){
        User::where('id', $id)->update([
            'admin_status'=> ''
        ]);
        return User::all();
    } 

    public function fundUserWallet(Request $request){
        $user = User::where('id', $request['user_id'])->get();

        $new_balance = $user['account']+$request['ammount'];
        User::where('id', $id)->update([
            'account'=> $new_balance
        ]);
        return User::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
