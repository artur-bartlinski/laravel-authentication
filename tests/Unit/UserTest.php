<?php

namespace Tests\Unit;

use App\Address;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    private $user;
    private $address;

    public function setUp()
    {
        parent::setUp();

        $this->address = factory(Address::class)->make();
        $this->user = factory(User::class)->make([
            'email' => 'john_doe@gmail.com',
        ]);

    }

    /** @test */
    public function can_register_a_user()
    {
        $this->attemptRegister();

        $this->assertDatabaseHas('users', [
            'email' => 'john_doe@gmail.com'
        ]);
    }

    /** @test */
    public function can_login_registered_user()
    {
        $this->attemptLogin();

        $this->assertEquals($this->user->email, Auth::user()->email);
    }

    /** @test */
    public function can_logout_user()
    {
        $this->attemptLogin();

        $this->post('/logout');

        $this->assertEmpty(Auth::user());
    }

    /** @test */
    public function can_return_user_details()
    {
        $this->be($this->user);

        $response = $this->get('/home');

        $response->assertSee('john_doe@gmail.com');
    }

    public function attemptRegister()
    {
        $this->post('/register', array_merge(
            $this->user->toArray(),
            [
                '_token' => csrf_token(),
                'password' => $this->user->password,
                'password_confirmation' => $this->user->password
            ],
            $this->address->toArray()
        ));
    }

    public function attemptLogin()
    {
        $this->attemptRegister();

        $this->post('/login', [
            'email' => 'john_doe@gmail.com',
            'password' => $this->user->password,
            '_token' => csrf_token()
        ]);
    }
}
