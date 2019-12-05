<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   
    /** @test */
    public function get_all_users(){
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }


    // /** @test */
    // public function create_user(){
    //     $response = $this->json('POST','/api/users',
    //     [
    //         'name' => 'Example Ex',
    //         'username' => 'exam',
    //         'email' => 'example@example.com',
    //         'phone_no'=> '0111111111',
    //         'password' => bcrypt('secret'), // password
    //         'role' => 'customer',
    //     ]);

    //     $response->assertStatus(201);
    // }

    // /** @test */
    // public function get_one_user(){
    //     $user = \App\User::where('email','example@example.com')->first();
    //     //dd($user);
    //     $response = $this->json('GET','/api/users'.$user->id);
    //     $response->assertStatus(200);
    // }

    // /** @test */
    // public function update_a_user(){
    //     $user = \App\User::where('email','example@example.com')->first();
    //     $response = $this->json('PUT','/api/users'.$user->id,
    //     [
    //         'phone_no'=> '0111111112',
    //         'password' => bcrypt('secret'), // password
    //     ]);

    //     $response->assertStatus(200);
    //}

    /** @test */
    public function delete_a_user(){
        $user = \App\User::where('email','example@example.com')->first();
        //dd($user);
        $response = $this->json('DELETE','/api/users'.$user->id);
        //dd($response);
        $response->assertStatus(204);
    }
}
