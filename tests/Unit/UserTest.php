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

        $this->user = factory(User::class)->make([
            'email' => 'john_doe@gmail.com',
        ]);

        $this->address = factory(Address::class)->make();
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
        $this->attemptRegister();

        $this->post('/login', [
            'email' => 'john_doe@gmail.com',
            'password' => $this->user->password,
            '_token' => csrf_token()
        ]);

        $this->assertEquals($this->user->email, Auth::user()->email);
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
}
