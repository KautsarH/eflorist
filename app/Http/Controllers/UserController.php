<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = User::updateOrcreate([
        //     'username' => request('username'),
        //     'password' =>  bcrypt(request('password')),
        //     'email' =>  request('email'),
        //     'phone_no' => request('phone_no'),
        //     'name' => request('name'),
        //     'role' => 'customer',
        // ]); 
        
        // if($user->save()){
        //     //return new UserResource($user);
        //     return "Success create user";
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$id) {
            return "Account doesn't exist";
        }
        try {
        $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return "Account doesn't exist";
        }
        return new UserResource($user);
    }
    public function showProfile($id)
    {
        $user = auth()->user();

        return back()->with('success_message', 'Profile (and password) updated successfully!');
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


    public function update(Request $request,$id)
    {   
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
             return "Account doesn't exist";
        }

        $user->update([
            'password' =>  bcrypt(request('password')),
            'phone_no' => request('phone_no'),

        ]); 

        if($user->save()){
            //return new UserResource($user);
            return "Success update user";
        }
    }

    public function updateProfile(Request $request)
    {   
        $user = auth()->user();

        $user->update([
            'password' =>  bcrypt(request('password')),
            'phone_no' => request('phone_no'),

        ]); 

        if($user->save()){
            //return new UserResource($user);
            return back()->with('success_message', 'Profile (and password) updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
             return "Account doesn't exist";
        }
        $user->delete();

       // if($user->delete()){
            //return new UserResource($user);
            return "Success delete user";
        //}
    }
}
