<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Alert;
use Hash;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     
    public function create()
    {
        return view('auth.signUp');
    }

    
    public function store(Request $request)
    {
        if (User::where('email', $request->email)->first() != null) {
            Alert::error('Email Exists', 'This email already exist, please try with new email');
             return back();
        }
        $seller_info = $request->except('password', 'email', 'confirm-password');
        $seller_info= Seller::create($seller_info);

        $user_info = [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'user_type' => 'seller',
            'seller_id' =>$seller_info->id,
         ];
        $user = new User();
        $user_info =  $user->create($user_info);
        Alert::success('Success', 'Registration Success'); 
        return view('auth/signIn');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
