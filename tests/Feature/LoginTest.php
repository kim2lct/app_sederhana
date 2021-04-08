<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */    

    public function testRequiresNameAndLogin()
    {
        $this->json('post', 'api/login')
            ->assertTrue()
            ->assertJson([
                'username' => ['The name field is required.'],
                'password' => ['The password field is required.'],
            ]);
    }

    public function testLoginSuccessfully()
    {        
        
        $payload = ['name' => 'adminku2', 'password' => 'admin123'];
        $response = Http::post(url('/api/login'),$payload); 
  
        $status = json_decode($response->body())->message;

        $this->assertTrue($status == 'success');
        $this->assertFalse($status == 'failed');

    }

    public function testRegisterSuccessfully()
    {
        $payload = [
            'username' => 'jaka122',
            'email' => 'jaka@topt212al12.com',
            'password' => '123qwerty',
            'cpassword' => '123qwerty',
            'status' => 'active',
            'position' => 'staff',
        ];

        $response = Http::withHeaders([
    '_token' => '6k4fMV8EwdLkRmZRnjO4jFfRb8OOqNguqRO4LdqKGlIBwqsNtqVGoU0Bx4gf',    
])->post(url('api/user/register'),$payload);        
    $status = json_decode($response->body())->message;

    $this->assertTrue($status == 'User Success created');
    $this->assertFalse($status == 'failed');
}

public function testUpdateSuccessfully()
    {
        $payload = [
            'username' => 'jaka122',
            'email' => 'jaka@top000t212al12.com',
            'password' => '123qwerty123',
            'cpassword' => '123qwerty123',
            'status' => 'active',
            'position' => 'staff',
        ];

        $response = Http::withHeaders([
    '_token' => 'X5IGtkT2IwJh6oB3nzob1wjb44xCbuH2Wz1sQ4ShnKWYbrdrTI4J0rJ3VWbu',    
])->post(url('api/user/29/edit'),$payload);       
    $status = json_decode($response->body())->message;

    $this->assertTrue($status == 'User Success updated');
    $this->assertFalse($status == 'failed');
}

public function testDeleteSuccessfully()
    {        
        $response = Http::withHeaders([
    '_token' => 'X5IGtkT2IwJh6oB3nzob1wjb44xCbuH2Wz1sQ4ShnKWYbrdrTI4J0rJ3VWbu',    
])->get(url('api/user/29/delete'));       
    $status = json_decode($response->body())->message;

    $this->assertTrue($status == 'User has been deleted');
    $this->assertFalse($status == 'failed');
}

public function testViewSuccessfully()
    {        
        $response = Http::withHeaders([
    '_token' => 'X5IGtkT2IwJh6oB3nzob1wjb44xCbuH2Wz1sQ4ShnKWYbrdrTI4J0rJ3VWbu',    
])->get(url('api/user/2'));       
    $status = json_decode($response->body())->message;    

    $this->assertTrue($status == 'success');
    $this->assertFalse($status == 'Not Found');
}

}
