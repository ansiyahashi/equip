<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Alert;

class ServiceProviderController extends Controller
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
    
    
    public function edit(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        //
    }
}
